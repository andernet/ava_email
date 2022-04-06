<?php

namespace App\Controllers;

use App\Helpers\Form_helper;
use App\Controllers\BaseController;
use App\Models\InstrucaoModel;

class InstrucaoController extends BaseController
{
    public function __construct(){
        helper (['form']);
    }

    public function index()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('p_instrucao p');
        $builder->join('p_status s', 's.id_status = p.id_status', 'left');
        $data['dados']   = $builder->get()->getResultArray();
        echo view('templates/header');
        echo view('instrucao/instrucao', $data);
    }

    public function form($data = null)
    {
        helper (['form']);
        $db      = \Config\Database::connect();
        $builder = new InstrucaoModel();
  
        $data['instrucao'] = $builder->get()->getResultArray();
        echo view('templates/header',);
        echo view('instrucao/form', $data);
    }

    public function create()
    {
        $db      = \Config\Database::connect();
        $model = new InstrucaoModel();
        $model->save($this->request->getPost());
        return redirect()->to("/InstrucaoController/");
    }

    public function edit($id_instrucao = null)
    {
        $builder = new InstrucaoModel();

        if(isset($id_instrucao)){
            $db      = \Config\Database::connect();
            $builder = $db->table('p_instrucao');
            $builder->where('id_instrucao ', $id_instrucao);
            $data['instrucao_ed'] = $builder->get()->getRow();
        }
        $this->form($data);
    }

    public function update($id_instrucao = null)
    {
        $db      = \Config\Database::connect();
        $builder = new InstrucaoModel();
        $data = $builder->find($id_instrucao);
        if($data['id_status'] == '1' ? $data['id_status'] = '2' : $data['id_status'] = '1');
        $db->table('p_instrucao')->where('id_instrucao', $id_instrucao)->update($data);
        return redirect()->to("/InstrucaoController/");
    }

    public function delete($id_instrucao = NULL)
    {
        
        $db      = \Config\Database::connect();
        $builder = $db->table('p_instrucao');
        $builder->where('id_instrucao', $id_instrucao);
        $builder->delete();
        return redirect()->to("/InstrucaoController/");
    }
}
