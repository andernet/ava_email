

<?php
   // echo '<pre>';
   // print_r(get_defined_vars());
   
   // [user_ed] => Array
   //      (
   //          [id_user] => 1
   //          [username] => admin
   //          [nome_aluno] => Admin
   //          [cpf] => 71472649168
   //          [id_tratamento] => 1
   //          [id_posto] => 1
   //          [id_quadro] => 1
   //          [id_especialidade] => 1
   //          [id_om] => 1
   //          [saram] => 123
   //          [id_curso] => 1
   //          [id_situacao] => 1
   //          [id_user_tipo] => 1
   //          [email] => andernet@gmail.com
   //          [cod_aluno] => 112313
  
   
   //exit();
   ?>
<div class="container">
   <div class="row">
      <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
         <div class="container">
            <h3>Registro de aluno</h3>
            <hr>
            <form class="" action="/UserController/create" method="post">
               <input type="hidden" name="id_user" id="id_user" value="<?= isset($user_ed) ? $user_ed['id_user'] : ''; ?>" />

             

               <div class="row">

                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="email" style="color:red">Nome do usuario</label>
                        <input type="text" class="form-control" name="username" id="username" value='<?= isset($user_ed) ? $user_ed['username'] : ""; ?>' placeholder="Ex: aluno007">
                     </div>
                  </div> 

                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="nome_aluno">Nome</label>
                        <input type="text" class="form-control" name="nome_aluno" id="nome_aluno" value='<?= isset($user_ed) ? $user_ed['nome_aluno'] : ""; ?>' placeholder="Ex: 2S Fulano">
                     </div>
                  </div>
                  
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" name="cpf" id="cpf" value='<?= isset($user_ed) ? $user_ed['cpf'] : ""; ?>'  placeholder="Ex: 12345678901" maxlength="11">
                     </div>
                  </div>
                  
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="id_tratamento">Tratamento</label>
                        <select class="custom-select mr-sm-2" name="id_tratamento" >
                           <option value="">Selecione</option>
                           <?php 
                           if(isset($dados['tratamento'])){ 
                              foreach ($dados['tratamento'] as $dado2) : ?>
                           <option value="<?= $dado2['id_tratamento']; ?>" <?= $dado2['id_tratamento'] == $user_ed['id_tratamento'] ? 'selected' : ''?>><?= $dado2['tratamento']; ?></option>
                           <?php endforeach; ?>
                           <?php } else { ?>
                           <option value="">Nao existe cursos</option>
                           <?php }?>
                        </select>
                     </div>
                  </div>
                  
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="id_posto">Posto</label>
                        <select class="custom-select mr-sm-2" name="id_posto" >
                           <option value="">Selecione</option>
                           <?php 
                           if(isset($dados['posto'])){ 
                              foreach ($dados['posto'] as $dado2) : ?>
                           <option value="<?= $dado2['id_posto']; ?>" <?= $dado2['id_tratamento'] == $user_ed['id_tratamento'] ? 'selected' : ''?>><?= $dado2['posto_sigla']; ?></option>
                           <?php endforeach; ?>
                           <?php } else { ?>
                           <option value="">Nao existe cursos</option>
                           <?php }?>
                        </select>
                     </div>
                  </div>
                  
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="id_quadro">Quadro</label>
                        <select class="custom-select mr-sm-2" name="id_quadro" >
                           <option value="">Selecione</option>
                           <?php 
                           if(isset($dados['quadro'])){ 
                              foreach ($dados['quadro'] as $dado2) : ?>
                           <option value="<?= $dado2['id_quadro']; ?>"><?= $dado2['quadro']; ?></option>
                           <?php endforeach; ?>
                           <?php } else { ?>
                           <option value="">Nao existe cursos</option>
                           <?php }?>
                        </select>
                     </div>
                  </div>
                  
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="id_especialidade">Especialidade</label>
                        <select class="custom-select mr-sm-2" name="id_especialidade" >
                           <option value="">Selecione</option>
                           <?php 
                           if(isset($dados['especialidade'])){ 
                              foreach ($dados['especialidade'] as $dado2) : ?>
                           <option value="<?= $dado2['id_especialidade']; ?>"><?= $dado2['especialidade']; ?></option>
                           <?php endforeach; ?>
                           <?php } else { ?>
                           <option value="">Nao existe cursos</option>
                           <?php }?>
                        </select>
                     </div>
                  </div>
                  
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="id_om">OM</label>
                        <select class="custom-select mr-sm-2" name="id_om" >
                           <option value="">Selecione</option>
                           <?php 
                           if(isset($dados['om'])){ 
                              foreach ($dados['om'] as $dado2) : ?>
                           <option value="<?= $dado2['id_om']; ?>"><?= $dado2['om_sigla']; ?></option>
                           <?php endforeach; ?>
                           <?php } else { ?>
                           <option value="">Nao existe cursos</option>
                           <?php }?>
                        </select>
                     </div>
                  </div>
                  
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="saram">SARAM/EB/MB/CV/CD</label>
                        <input type="text" class="form-control" name="saram" id="saram" value='<?= isset($user_ed) ? $user_ed['saram'] : ""; ?>'>
                     </div>
                  </div>
                  
                  
                  
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="curso">Curso</label>
                        <select class="custom-select mr-sm-2" name="id_curso" >
                           <option value="">Selecione</option>
                           <?php 
                           if(isset($dados['curso'])){ 
                              foreach ($dados['curso'] as $dado2) : ?>
                           <option value="<?= $dado2['id_curso']; ?>"><?= $dado2['curso_sigla']; ?></option>
                           <?php endforeach; ?>
                           <?php } else { ?>
                           <option value="">Nao existe cursos</option>
                           <?php }?>
                        </select>
                        </div>
                  </div>
                  <div class="fcol-12 col-sm-6">
                     <label class="mr-sm-2" for="id_user_tipo">Tipo de usuário</label>
                     
                     <select class="custom-select mr-sm-2" name="id_user_tipo" >
                           <option value="">Selecione</option>
                           <?php 
                           if(isset($dados['user'])){ 
                              foreach ($dados['user'] as $dado2) : ?>
                           <option value="<?= $dado2['id_user_tipo']; ?>"><?= $dado2['user_tipo_descricao']; ?></option>
                           <?php endforeach; ?>
                           <?php } else { ?>
                           <option value="">Nao existe cursos</option>
                           <?php }?>
                        </select>
                  </div>

                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" name="password" id="password" value='' >
                     </div>
                  </div>
                  
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="password_confirm">Confirmar Senha</label>
                        <input type="password" class="form-control" name="password_confirm" id="password_confirm" value=''>
                     </div>
                  </div>

                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" value='<?= isset($user_ed) ? $user_ed['email'] : ""; ?>' >
                     </div>
                  </div> 

                  
                  <br />
               </div>
               <br />
               <div class="row">
                           <?php if (isset($validation)): ?>
            <div class="col-12">
              <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors() ?>
              </div>
            </div>
          <?php endif; ?>
                  <div class="col-12 col-sm-4">
                     <button type="submit" name='validate' class="btn btn-primary">Gravar</button>
                  </div>
               </div>
            </form>
         </div>


  
      </div>
   </div>
</div>

