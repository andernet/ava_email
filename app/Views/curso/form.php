<?php
echo '<pre>';
print_r(get_defined_vars());

//print();
//exit();
// //$info[0]->id
//
// print_r($curso_ed->curso_sigla)

//dd($curso_ed->curso_sigla);

?>
<div class="container mt-5">
    
    <form class="" action="<?= base_url('/CursoController/create/') ?>" method="post">
        
        <input type="hidden" name="id_curso_status" id="id_curso_status" value="1" />
        
        <div class="container mt-5">
            <label for="nome_aluno">Sigla</label>
            <input type="text" value=' <?= isset($curso_ed) ? "$curso_ed->curso_sigla" : "não" ?>' class="form-control" id='curso_sigla' name="curso_sigla" size="50"/>
        <br />
            <label for="nome_aluno">Descrição</label>
            <input type="text" value=' <?= isset($curso_ed) ? "$curso_ed->curso_descricao" : "não" ?>' class="form-control" id="curso_descricao" name="curso_descricao" placeholder="Ex: Curso pra fazer curso" />
        <br />
            <label for="nome_aluno">Período</label>
            <input type="text" value=' <?= isset($curso_ed) ? "$curso_ed->curso_periodo" : "não" ?>' class="form-control" id="curso_periodo" name="curso_periodo" placeholder="Ex: Curso pra fazer curso" />
        <br />
            <label for="nome_aluno">Tipo</label>
            <select name="id_curso_tipo">
                    <option>Selecione</option>

                    <?php if(isset($curso)){ 
                    foreach ($curso as $dado2) : ?>
                    <option value="<?= $dado2['id_curso_tipo']; ?>"><?= $dado2['curso_tipo_sigla']; ?></option>
                    <?php endforeach; ?>
                        <?php } else { ?>
        <option value="">Nao existe cursos</option>
        <?php    }?>
        </select>
        </div>
        
        <div class="container mt-5">
            <div class="col-12 col-sm-4">
                <button type="submit" class="btn btn-success mb-3">Gravar</button>
            </div>
        </div>
    </form>