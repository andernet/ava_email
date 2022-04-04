<?php

namespace App\Controllers;

use App\Helpers\Form_helper;
use App\Controllers\BaseController;
use App\Models\CursoModel;

class CursoController extends BaseController
{
    public function __construct(){
        helper (['form']);
        $model = new CursoModel();
        //parent::__construct();
        //$this -> load -> library('form_validation');
    }

    public function index()
    {
        $db      = \Config\Database::connect();

        $builder = $db->table('p_curso p');
        $builder->join('p_curso_status s', 's.id_curso_status = p.id_curso_status', 'left');
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
        $model = new CursoModel();
        $model->save($this->request->getPost());
        return redirect()->to("/CursoController/");
    }

    public function edit($id_curso = null)
    {
        $model = new CursoModel();
        //$data = $model->find($id_curso);

        if(isset($id_curso)){
            $db      = \Config\Database::connect();
            $builder = $db->table('p_curso');
            $builder->where('id_curso ', $id_curso);
            $data['curso_ed'] = $builder->get()->getRow();
        }
        //dd($data);

        $this->form($data);
    }

    /* controller to update a user */
    public function update(){

        /* calling the update function on model sending the form */
        $this->model->init_update($this->request->getVar());

        /* add success message in flashdata */
        $this->session->setFlashdata('message', "<div class = 'alert alert-success'><b>Success, user edited!</b></div>");

        /* return to default page */
        return redirect("/");


    }

    /* controller to delete a user */
    public function delete($id = NULL){

        /* calling the delete function on model sending the url id */
        $this->model->init_delete($id);
        
        /* add success message in flashdata */
        $this->session->setFlashdata('message', "<div class = 'alert alert-success'><b>Success, user deleted!</b></div>");
        
        /* return to default page */
        return redirect("/");
        
    }
}
