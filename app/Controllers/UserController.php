<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Helpers\Form_helper;

class UserController extends BaseController
{
    private $userModel;

	public function __construct()
	{
		$this->userModel = new UserModel();
		helper (['form']);
	}

	public function index()
	{
		echo view('templates/header');

        $db      = \Config\Database::connect();
        $builder = $db->table('s_user as u');

        $builder->select('
            u.username, 
            u.nome_aluno, 
            u.id_user, 
            u.cpf, 
            u.saram,
            u.cod_aluno,
            u.email,
            c.curso_sigla, 
            o.om_sigla, 
            c.curso_periodo, 
            t.tratamento, 
            q.quadro, 
            p.posto_sigla, 
            e.especialidade, 
            c-e.cod_verificacao,
            s.situacao');
        
        $builder->join('p_especialidade e', 'e.id_especialidade = u.id_especialidade', 'left');
        $builder->join('p_om o', 'o.id_om = u.id_om', 'left');
        $builder->join('p_posto p', 'p.id_posto = u.id_posto', 'left');
        $builder->join('p_quadro q', 'q.id_quadro = u.id_quadro', 'left');
        $builder->join('p_tratamento t', 't.id_tratamento = u.id_tratamento', 'left');
        $builder->join('p_curso c', 'c.id_curso = u.id_curso', 'left');
        $builder->join('s_certificado_emitido c-e', 'c-e.cod_aluno = u.cod_aluno', 'left');
        $builder->join('p_situacao s', 's.id_situacao = u.id_situacao', 'left');

        //dd($builder->getCompiledSelect());
        
        $query['aluno'] = $builder->get()->getResultArray();
        
        return view('users/users', $query);   
        //return view('aluno/lista_aluno', [
        //  'aluno' => $this->alunoModel->paginate(10),
        //  'pager' => $this->alunoModel->pager
        // ]);
	}

	public function login()
	{
		$data = [];

		echo view('include_files/header');
        echo view('include_files/nav');
		//return view('login');
		echo view('login');
		echo view('include_files/footer');
	}

	public function list()
	{
		echo view('include_files/header');
        echo view('include_files/nav');
		return view('users/users', [
			'users' => $this->userModel->paginate(10),
			'pager' => $this->userModel->pager
		]);
	}

	public function delete($id_user)
	{
		if ($this->userModel->delete($user_id)) {
			return redirect()->to('UserController');
			// echo view('messages', [
			// 	'message' => 'Usuário Excluído com Sucesso'
			// ]);
		} else {
			echo "Erro.";
		}
	}


	public function cad_user() {
		
		$db      = \Config\Database::connect();
        $builder = $db->table('p_user_tipo');
        $data['user'] = $builder->get()->getResultArray();

        $builder = $db->table('p_curso');
        $data['curso'] = $builder->get()->getResultArray();

        $builder = $db->table('p_tratamento');
        $data['tratamento'] = $builder->get()->getResultArray();

        $builder = $db->table('p_posto');
        $data['posto'] = $builder->get()->getResultArray();

        $builder = $db->table('p_quadro');
        $data['quadro'] = $builder->get()->getResultArray();

        $builder = $db->table('p_especialidade');
        $data['especialidade'] = $builder->get()->getResultArray();

        $builder = $db->table('p_om');
        $data['om'] = $builder->get()->getResultArray();

		echo view('templates/header', $data);
        echo view('users/cad_user');
        echo view('templates/footer');

		//https://www.youtube.com/watch?v=SbiszsRnETo
    }

	public function create()
	{
		$validation =  \Config\Services::validation();
		$data = [];
		helper (['form']);

		// 'senha'=>Hash::make($senha),

		echo '<pre>';
		//var_dump($_POST);
		//var_dump(get_defined_vars());


		$password = $this->request->getVar('password');
		//$this->request->getVar('password') = Hash::make($this->request->getVar('password'));
		$getVar('password') = $password;

		echo $password;
		echo $this->request->getVar('password');
		exit();

        $db      = \Config\Database::connect();
        $model = new userModel();

        //$newData = [

				// 'username' => $this->request->getVar('user_nome'),
				// 'nome_aluno' => $this->request->getVar('user_nome'),
				// 'cpf' => $this->request->getVar('user_nome'),
				// 'id_tratamento' => $this->request->getVar('user_nome'),
				// 'id_posto' => $this->request->getVar('user_nome'),
				// 'id_quadro' => $this->request->getVar('user_nome'),
				// 'id_especialidade' => $this->request->getVar('user_nome'),
				// 'id_om' => $this->request->getVar('user_nome'),
				// 'saram' => $this->request->getVar('user_nome'),
				// 'id_curso' => $this->request->getVar('user_nome'),
				// 'id_user_tipo' => $this->request->getVar('user_nome'),
				// 'password' => $this->request->getVar('user_nome'),
				// 'email' => $this->request->getVar('user_nome'),
				// ];



        $model->save($this->request->getPost());

		

   //      if ($this->request->getMethod() == 'post') {
			// //let's do the validation here
			// //echo '1';
			// $rules = [

			// 	'username' => 'required|min_length[5]|max_length[20]',
		 //        'nome_aluno' => 'required|min_length[5]|max_length[50]',
		 //        'cpf' => 'required|min_length[11]|max_length[11]',
		 //        'id_tratamento' => 'required|min_length[1]|max_length[2]',
		 //        'id_curso' => 'required|min_length[1]|max_length[2]',
		 //        'id_user_tipo' => 'required|min_length[1]|max_length[2]',
		 //        'password' => 'required|min_length[5]|max_length[20]',
		 //        'password_confirm' => 'matches[password]',
		 //        'email'    => 'required|valid_email',
			// ];

			// if (! $this->validate($rules)) {
			// 	//echo '2';
			// 	$data['validation'] = $this->validator;
			// }else{
			// 	//echo '3';

			// 	$model = new UserModel();

			// 	$newData = [

			// 	'username' => $this->request->getVar('user_nome'),
			// 	'nome_aluno' => $this->request->getVar('user_nome'),
			// 	'cpf' => $this->request->getVar('user_nome'),
			// 	'id_tratamento' => $this->request->getVar('user_nome'),
			// 	'id_posto' => $this->request->getVar('user_nome'),
			// 	'id_quadro' => $this->request->getVar('user_nome'),
			// 	'id_especialidade' => $this->request->getVar('user_nome'),
			// 	'id_om' => $this->request->getVar('user_nome'),
			// 	'saram' => $this->request->getVar('user_nome'),
			// 	'id_curso' => $this->request->getVar('user_nome'),
			// 	'id_user_tipo' => $this->request->getVar('user_nome'),
			// 	'password' => $this->request->getVar('user_nome'),
			// 	'email' => $this->request->getVar('user_nome'),
			// 	];
			// 	$model->save($newData);
			// 	$session = session();
			// 	$session->setFlashdata('success', 'Registrado com sucesso.');
			// 	return redirect()->to('users/register');

			// }
		// }
		


		//return redirect()->to('/UserController/cad_user', $data);
		// echo view('templates/header', $data);
		// echo view('users/cad_user');
}
	public function edit($id)
	{
		return view('form', [
			'user' => $this->userModel->find($id)
		]);
	}

	

}


// 		echo view('include_files/header', $data);
//         echo view('include_files/nav');
// 		echo view('users/register');
