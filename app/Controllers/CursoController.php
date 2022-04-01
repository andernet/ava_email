<?php

namespace App\Controllers;

use App\Helpers\Form_helper;
use App\Controllers\BaseController;
use App\Models\CursoModel;

class CursoController extends BaseController
{

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

    public function form($id = null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('p_curso_tipo');
        $data['curso'] = $builder->get()->getResultArray();
        

        echo view('templates/header',);
        echo view('curso/form', $data);
    }



    public function create()
    {
        $model = new CursoModel();
        $model->save($this->request->getVar());
        return redirect()->to("/CursoController/");
    }

    public function edit($id)
    {
        $model = new CursoModel();
        $data = $model->find($id);
        //dd($data);

        $this->form();
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
