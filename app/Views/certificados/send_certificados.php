<?php
// echo '<pre>';
// print_r(get_defined_vars());

?>

<div class="container mt-5">
    <?php echo anchor(base_url('/AlunoController/cad_aluno'), 'Novo curso', ['class' => 'btn btn-success mb-3']) ?>
    <table class="table" id="tbaluno">
        <thead>
        <tr>
            <th>ID</th>
            <th>Sigla</th>
            <th>Descrição</th>
            <th>Período</th>
            <th>Situação</th>
            <th>Tipo</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tfoot>

        <?php
        if(isset($dados)){ 
        foreach ($dados as $dado) : ?>
            <tr>
                <td><?php echo $dado['id_curso'] ?></td>
                <td><?php echo $dado['curso_sigla'] ?></td>
                <td><?php echo $dado['curso_descricao'] ?></td>
                <td><?php echo $dado['curso_periodo'] ?></td>
                <td><?php echo $dado['curso_sigla'] ?></td>
                <td><?php echo $dado['status_descricao'] ?></td>
                <td><?php echo $dado['curso_tipo_sigla'] ?></td>
                <td>
                    <?php echo anchor('AlunoController/edit/' . $dado['id_curso'], 'Editar', ['class' => 'btn btn-primary']) ?>
                        -
                    <?php echo anchor('CertificadoController/geraCodigo/' . $dado['id_curso'], 'Ativar/Desativa', ['class' => 'btn btn-info']) ?>
                    -
                    <?php 
                    if($dado['curso_tipo_sigla'] == 'EAD'){

                    echo anchor('CertificadoController/sendCertificado/' . $dado['id_curso'], 'Enviar', ['class' => 'btn btn-success', 'target'=>'_blank' ]);
                    }
            ?>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php } else { ?>
        <tr><td> Nao existe cursos </td></tr>

<?php    }?>

    </tfoot>
    </table>

    <form class="" action="<?= base_url('/CursoController/save_curso/'); ?>" method="get">
        <input type="hidden" name="id_curso_status" value="1" />
        <div class="container mt-5">
            <label for="nome_aluno">Sigla</label>
            <input type="text" class="form-control" name="curso_sigla" placeholder="Ex: Curso pra fazer curso" />
        <br />
            <label for="nome_aluno">Descrição</label>
            <input type="text" class="form-control" name="curso_descricao" placeholder="Ex: Curso pra fazer curso" />
        <br />
            <label for="nome_aluno">Período</label>
            <input type="text" class="form-control" name="curso_periodo" placeholder="Ex: Curso pra fazer curso" />
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
                <button type="submit" class="btn btn-primary">Gravar</button>
            </div>
        </div>
    </form>
    
</div>
