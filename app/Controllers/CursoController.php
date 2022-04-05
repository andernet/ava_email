<?php

namespace App\Controllers;

use App\Helpers\Form_helper;
use App\Controllers\BaseController;
use App\Models\CursoModel;

class CursoController extends BaseController
{
    public function __construct(){
        helper (['form']);
    }

    public function index()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('p_curso p');
        $builder->join('p_status s', 's.id_status = p.id_status', 'left');
        $builder->join('p_curso_tipo t', 't.id_curso_tipo  = p.id_curso_tipo ', 'left');
        $data['dados']   = $builder->get()->getResultArray();
        $builder = $db->table('p_curso_tipo');
        $data['curso'] = $builder->get()->getResultArray();
        echo view('templates/header');
        echo view('curso/curso', $data);
    }

    public function form($data = null)
    {
        helper (['form']);
        $db      = \Config\Database::connect();
        $builder = $db->table('p_curso_tipo');
        $data['curso'] = $builder->get()->getResultArray();
        echo view('templates/header',);
        echo view('curso/form', $data);
    }

    public function create()
    {
        //dd(getPost());
        $db      = \Config\Database::connect();
        $model = new CursoModel();
        //$sql = $builder->getCompiledSelect();
        //dd($model->save($this->request->getPost()));
        $model->save($this->request->getPost());
        return redirect()->to("/CursoController/");
    }

    public function edit($id_curso = null)
    {
        $model = new CursoModel();
        if(isset($id_curso)){
            $db      = \Config\Database::connect();
            $builder = $db->table('p_curso');
            $builder->where('id_curso ', $id_curso);
            $data['curso_ed'] = $builder->get()->getRow();
        }
        $this->form($data);
    }

    public function update($id_curso = null){


        $db      = \Config\Database::connect();
        $builder = new CursoModel();
        $builder->where('id_curso', $id_curso);
        $data = $builder->get()->getResultArray();

        echo($data[0]->id_status);

        if($data['id_status'] == '1' ? $id_status = '2' : $id_status = '1');

        dd($data);




        $builder->where('id_curso', $id_curso);
        $builder->update($id_status, "id_curso = $id_curso");
        // $model->init_update($this->request->getVar());

        //  // add success message in flashdata 
        // $this->session->setFlashdata('message', "<div class = 'alert alert-success'><b>Success, user edited!</b></div>");

        /* return to default page */
        return redirect("/");


    }

    /* controller to delete a user */
    public function delete($id_curso = NULL){
        
        $db      = \Config\Database::connect();
        $builder = $db->table('p_curso');
        $builder->where('id_curso', $id_curso);
        $builder->delete();

        return redirect()->to("/CursoController/");
        
    }
}
