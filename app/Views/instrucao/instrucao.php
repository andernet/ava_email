<?php
// echo '<pre>';
// print_r(get_defined_vars());
//die();
?>
<div class="container mt-5">
    <h4 align="center">INTRUÇÕES</h4>
    <?php echo anchor(base_url('/InstrucaoController/form'), 'Nova Instrução', ['class' => 'btn btn-success mb-3']) ?>
</div>



    <table class="table" id="tbaluno">
        <thead>
        <tr>
            <th>ID</th>
            <th>Sigla</th>
            <th>Descrição</th>
            <th>Situação</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tfoot>

        <?php
        if(isset($dados)){ 
        foreach ($dados as $dado) : ?>
            <tr>
                <td><?php echo $dado['id_instrucao'] ?></td>
                <td><?php echo $dado['instrucao_sigla'] ?></td>
                <td><?php echo $dado['instrucao_descricao'] ?></td>
                <td><?php echo $dado['status_descricao'] ?></td>
                <td>
                    <?php echo anchor('InstrucaoController/edit/' . $dado['id_instrucao'], 'Editar', ['class' => 'btn btn-primary']) ?>


                    
                    <?php 
                   
                    echo anchor('InstrucaoController/update/' . $dado['id_instrucao'], 'Ativar/Desativa', ['class' => 'btn btn-info']);
                    
                    ?>

                    <?php 
                    if (session()->get('tipoUser') == 1):
                    echo anchor('InstrucaoController/delete/' . $dado['id_instrucao'], "<button type='button' class='btn btn-danger'>Excluir</button>", ['onclick' => 'return deletar()']); 
                    endif;
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