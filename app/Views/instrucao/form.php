<?php
// echo '<pre>';
// print_r(get_defined_vars());

//print();
//exit();
// //$info[0]->id
//
// print_r($curso_ed->curso_sigla)

//dd($curso_ed->curso_sigla);

?>
<div class="container mt-5">
    
    <form class="" action="<?= base_url('/InstrucaoController/create/') ?>" method="post">
        
        <input type="hidden" name="id_status" id="id_status" value="1" />

        <input type="hidden" name="id_instrucao" id="id_instrucao" value='<?= isset($instrucao_ed) ? "$instrucao_ed->id_instrucao" : ""; ?>' />
        
        <div class="container mt-5">
            <label for="nome_aluno">Sigla da intrução</label>
            <input type="text" value='<?= isset($instrucao_ed) ? "$instrucao_ed->instrucao_sigla" : ""; ?>' class="form-control" id='instrucao_sigla' name='instrucao_sigla' size="50" required/>
        <br />
            <label for="nome_aluno">Descrição da intrução</label>
            <input type="text" value='<?= isset($instrucao_ed) ? "$instrucao_ed->instrucao_descricao" : "" ?>' class="form-control" id="instrucao_descricao" name='instrucao_descricao' required/>

        <br />
        </div>

        
        <div class="container mt-5">
            <div class="col-12 col-sm-4">
                <button type="submit" class="btn btn-success mb-3">Gravar</button>
            </div>
        </div>
    </form>