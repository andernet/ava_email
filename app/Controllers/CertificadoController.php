<?php

namespace App\Controllers;
use App\Models\AlunoModel;
use App\Models\UserModel;
use App\Libraries\Hash;
use ZipArchive;


class CertificadoController extends BaseController
{
	public function __construct()
	{
		$this->userModel = new AlunoModel();

		

	}
    public function index()
    {
    	
        
    }

    public function zipDownload()
    {
    	//$this->load->library('zip');

		$zip = new ZipArchive(); 
    	
    	$ficheiro = '/public/certificados';
    	//$this->zip->compression_level = 5;
    	//$zip->add_data($ficheiro);
    	// $file = $zip->add_dir('$ficheiro');
    	// $this->zip->archive('certificados.zip');
    	// $this->zip->zipDownload('certificados.zip');

		$res = $zip->open('test.zip', ZipArchive::CREATE);
		if ($res === TRUE) {
		    $zip->addFromString('test.txt', 'file content goes here');
		    $zip->addFile('/certificados/certi.pdf');
		    $zip->close();
		    echo 'ok';
		} else {
		    echo 'failed';
		}



    }


	
	public function gerar_certificado_curso($id_curso = null)
    {
    	
    }
    
    public function sendCertificado($id_user = null)
    {
    	$email = \Config\Services::email();
    	$db      = \Config\Database::connect();

    	$builder = $db->table('s_user');
        $builder->where('id_user ', $id_user);


        //retorna objeto para acessar echo $data['dados']->id_curso;
        $data['dados'] = $builder->get()->getRow();

        $to = $data['dados']->email;

        // echo $to;
        // exit();
        $subject='Email Test sadfasdf';
        $message='Testing the email class.';
        $filepath1='img/email.png';
        $filepath2='certificados/certi.pdf';
        $filepath3= $this->select_certificado($data['dados']->id_user);;
        //senha zna3FgFa3wWN3dW

        $email->setFrom('certificadoemailteste@gmail.com', 'certificadoemailteste');
        $email->setTo($to);
        // $email->setCC('another@another-example.com');
        // $email->setBCC('them@their-example.com');

        $email->setSubject($subject);
        $email->setMessage($message);
        $email->attach($filepath1);
        $email->attach($filepath2);

        if ($email->send()){
            echo 'Enviado';
        } else{
            echo 'Erro';
        }

}

  

     public function geraPDF($data = null, $data2 = null)
     // public function geraPDF($query = null)
	 {

	 	//dd($data);
	 	$nome_arquivo = 'teste23';
		$mpdf = new \Mpdf\Mpdf();

		$mpdf->AddPage('L', '', '', '', '', 29, 25, 55, 30, 18, 12);
		// $html = view('certificados/certificado_f',[]);
		$html = view('certificados/certificado_f', $data);
		$mpdf->WriteHTML($html);
		$html = ob_get_clean();
		$mpdf->AddPage('L', '', '', '', '', 29, 25, 55, 30, 18, 12);
		$html = view('certificados/certificado_v',$data2);
		$mpdf->WriteHTML($html);
		$this->response->setHeader('Content-Type', 'application/pdf');
		//$mpdf->Output('arjun.pdf','I'); // opens in browser
		$mpdf->Output("certificados/certi.pdf", 'F');
		//$mpdf->Output();
		//$mpdf->Output('tmp/' . $fileName, $email ? 'F' : 'D');
		//return redirect($mpdf->Output("$nome_arquivo.pdf", 'I'))->to( site_url('/') );
		//$mpdf->Output('arjun.pdf','D'); 
		
	 }


	 public function geraCodigo($cod_aluno = null){
	 	$db = \Config\Database::connect();
	 	$builder = $db->table('s_certificado_emitido');
	 	$builder->select('cod_aluno');
	 	$builder->where('cod_aluno ', $cod_aluno );
	 	$data['dados'] = $builder->get()->getRow();
		if ( isset($data['dados'])) {
			$data =[
				'erro' => 'ja tem',
			];
			return redirect()->to('UserController/');
		} else {
			$cod_verificacao = uniqid();
			//$sql = "insert into s_certificado_emitido (cod_aluno, cod_verificacao) VALUES('" . $data['dados']."','". $cod_verificacao ."'";
			$sql = "insert into s_certificado_emitido (cod_aluno, cod_verificacao) VALUES('".$cod_aluno."', '". $cod_verificacao ."')";
			
			$db->query($sql);
			return redirect()->to('/UserController/');
		}
	 }

	 public function select_certificado($id_user = null)
	 {	
	 	$db      = \Config\Database::connect();
        $builder = $db->table('s_user as a');
        $builder->where('id_user ', $id_user );

        $builder->select('
            a.nome, 
            a.id_user, 
            a.cpf, 
            a.saram,
            a.cod_aluno,
            c.curso_sigla, 
            c.curso_descricao, 
            c.id_curso, 
            o.om_sigla, 
            c.curso_periodo, 
            t.tratamento, 
            q.quadro, 
            p.posto_sigla, 
            e.especialidade, 
            c-e.cod_verificacao,
            s.situacao');
        
        $builder->join('p_especialidade e', 'e.id_especialidade = a.id_especialidade', 'left');
        $builder->join('p_om o', 'o.id_om = a.id_om', 'left');
        $builder->join('p_posto p', 'p.id_posto = a.id_posto', 'left');
        $builder->join('p_quadro q', 'q.id_quadro = a.id_quadro', 'left');
        $builder->join('p_tratamento t', 't.id_tratamento = a.id_tratamento', 'left');
        $builder->join('p_curso c', 'c.id_curso = a.id_curso', 'left');
        $builder->join('s_certificado_emitido c-e', 'c-e.cod_aluno = a.cod_aluno', 'left');
        $builder->join('p_situacao s', 's.id_situacao = a.id_situacao', 'left');

        //retorna objeto para acessar $dados->nome
		$data['dados'] = $builder->get()->getRow();
		$db      = \Config\Database::connect();
        $builder = $db->table('p_cursos_curriculo as c');
        $builder->where('id_curso ', $data['dados']->id_curso);
        //gera um array
        $data2['dados'] = $builder->get()->getResultArray();
		$this->geraPDF($data, $data2);	 	
	 }
}




