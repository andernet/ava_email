<?php

namespace App\Controllers;

use App\Helpers\Form_helper;
use App\Controllers\BaseController;
use App\Models\InstrutorModel;

class InstrutorController extends BaseController
{
    public function __construct(){
        helper (['form']);
    }

    public function index()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('p_instrutor p');
        $builder->join('p_status s', 's.id_status = p.id_status', 'left');
        //$builder->join('p_instrutor_tipo t', 't.id_instrutor_tipo  = p.id_instrutor_tipo ', 'left');
        $data['dados']   = $builder->get()->getResultArray();
        $builder = $db->table('p_instrutor');
        $data['instrutor'] = $builder->get()->getResultArray();
        echo view('templates/header');
        echo view('instrutor/instrutor', $data);
    }

    public function form($data = null)
    {
        helper (['form']);
        $db      = \Config\Database::connect();
        $builder = $db->table('p_instrutor');
        $data['instrutor'] = $builder->get()->getResultArray();
        echo view('templates/header',);
        echo view('instrutor/form', $data);
    }

    public function create()
    {
        $db      = \Config\Database::connect();
        $builder = new InstrutorModel();
        $builder->save($this->request->getPost());
        return redirect()->to("/instrutorController/");
    }

    public function edit($id_instrutor = null)
    {
        $model = new instrutorModel();
        if(isset($id_instrutor)){
            $db      = \Config\Database::connect();
            $builder = $db->table('p_instrutor');
            $builder->where('id_instrutor ', $id_instrutor);
            $data['instrutor_ed'] = $builder->get()->getRow();
        }
        $this->form($data);
    }

    public function update($id_instrutor = null)
    {
        $db      = \Config\Database::connect();
        $builder = new instrutorModel();
        $data = $builder->find($id_instrutor);
        if($data['id_status'] == '1' ? $data['id_status'] = '2' : $data['id_status'] = '1');
        $db->table('p_instrutor')->where('id_instrutor', $id_instrutor)->update($data);
        return redirect()->to("/InstrutorController/");
    }

    public function delete($id_instrutor = NULL)
    {
        
        $db      = \Config\Database::connect();
        $builder = $db->table('p_instrutor');
        $builder->where('id_instrutor', $id_instrutor);
        $builder->delete();
        return redirect()->to("/InstrutorController/");
    }
}
