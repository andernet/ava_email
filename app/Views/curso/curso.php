<?php
// echo '<pre>';
// print_r(get_defined_vars());

?>



<!-- <br /> -->
<div class="container mt-5">
    <h4 align="center">CURSOS</h4>
    <?php echo anchor(base_url('/CursoController/form'), 'Novo Curso', ['class' => 'btn btn-success mb-3']) ?>
</div>



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
                <td><?php echo $dado['status_descricao'] ?></td>
                <td><?php echo $dado['curso_tipo_sigla'] ?></td>
                <td>
                    <?php echo anchor('CursoController/edit/' . $dado['id_curso'], 'Editar', ['class' => 'btn btn-primary']) ?>


                    
                    <?php echo anchor('CursoController/update/' . $dado['id_curso'], 'Ativar/Desativa', ['class' => 'btn btn-info']) ?>

                    <?php if (session()->get('tipoUser') == 1):

                    echo anchor('CursoController/delete/' . $dado['id_curso'], "<button type='button' class='btn btn-danger'>Excluir</button>", ['onclick' => 'return deletar()']);

                    endif; 
                    ?>
                    
                    <?php 
                    if($dado['curso_tipo_sigla'] == 'EAD'){

                    echo anchor('CursoController/sendCertificado/' . $dado['id_curso'], 'Enviar', ['class' => 'btn btn-success', 'target'=>'_blank' ]);
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

    
    
</div>