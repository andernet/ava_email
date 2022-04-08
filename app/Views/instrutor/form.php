<?php
// echo '<pre>';
// print_r(get_defined_vars());

//print();
//exit();
// //$info[0]->id
//
// print_r($instrutor_ed->instrutor_div)

//dd($instrutor_ed->instrutor_div);

?>
<div class="container mt-5">
    <h4 align="center">NOVO INTRUTOR</h4>
    
    <form class="" action="<?= base_url('/InstrutorController/create/') ?>" method="post">
        
        <input type="hidden" name="id_status" id="id_status" value="1" />

        <input type="hidden" name="id_instrutor" id="id_instrutor" value='<?= isset($instrutor_ed) ? "$instrutor_ed->id_instrutor" : ""; ?>' />
        
        <div class="container mt-5">
            <label for="nome_aluno">Sigla</label>
            <input type="text" value='<?= isset($instrutor_ed) ? "$instrutor_ed->instrutor_div" : ""; ?>' class="form-control" id='instrutor_div' name="instrutor_div" size="50" required/>
        <br />
            <label for="nome_aluno">Descrição</label>
            <input type="text" value='<?= isset($instrutor_ed) ? "$instrutor_ed->instrutor_nome" : "" ?>' class="form-control" id="instrutor_nome" name="instrutor_nome" required/>
        <br />
            
        </div>
        
        <div class="container mt-5">
            <div class="col-12 col-sm-4">
                <button type="submit" class="btn btn-success mb-3">Gravar</button>
            </div>
        </div>
    </form>