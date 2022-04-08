<?php
// echo '<pre>';
// print_r(get_defined_vars());
// exit();
?>



<!-- <br /> -->
<div class="container mt-5">
    <h4 align="center">INTRUTORES</h4>
    <?php echo anchor(base_url('/instrutorController/form'), 'Novo instrutor', ['class' => 'btn btn-success mb-3']) ?>
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
                <td><?php echo $dado['id_instrutor'] ?></td>
                <td><?php echo $dado['instrutor_div'] ?></td>
                <td><?php echo $dado['instrutor_nome'] ?></td>
                <td><?php echo $dado['status_descricao'] ?></td>
                <td>
                    <?php echo anchor('instrutorController/edit/' . $dado['id_instrutor'], 'Editar', ['class' => 'btn btn-primary']) ?>


                    
                    <?php 
                    
                        echo anchor('InstrutorController/update/' . $dado['id_instrutor'], 'Ativar/Desativa', ['class' => 'btn btn-info']);
                    
                    ?>

                    <?php 
                    if (session()->get('tipoUser') == 1):
                    echo anchor('InstrutorController/delete/' . $dado['id_instrutor'], "<button type='button' class='btn btn-danger'>Excluir</button>", ['onclick' => 'return deletar()']);
                    endif;
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php } else { ?>
        <tr><td> Nao existe instrutors </td></tr>

<?php    }?>

    </tfoot>
    </table>

    
    
</div>