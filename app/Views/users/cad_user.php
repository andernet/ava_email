

<?php
   // echo '<pre>';
   // print_r(get_defined_vars());
   
   
   // exit();
   ?>
<div class="container">
   <div class="row">
      <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
         <div class="container">
            <h3>Registro de aluno</h3>
            <hr>
            <form class="" action="/UserController/create" method="post">
               <div class="row">

                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="email" style="color:red">Nome do usuario</label>
                        <input type="text" class="form-control" name="username" id="username" value="" >
                     </div>
                  </div> 

                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="nome_aluno">Nome</label>
                        <input type="text" class="form-control" name="nome_aluno" id="nome_aluno" placeholder="Ex: 2S Fulano" value="<?= set_value('nome_aluno')  ?>" >
                     </div>
                  </div>
                  
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Ex: fulano_ft" value="<?= set_value('cpf') ?>" >
                     </div>
                  </div>
                  
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="id_tratamento">Tratamento</label>
                        <select class="custom-select mr-sm-2" name="id_tratamento" >
                           <option value="">Selecione</option>
                           <?php 
                           if(isset($tratamento)){ 
                              foreach ($tratamento as $dado2) : ?>
                           <option value="<?= $dado2['id_tratamento']; ?>"><?= $dado2['tratamento']; ?></option>
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
                           if(isset($posto)){ 
                              foreach ($posto as $dado2) : ?>
                           <option value="<?= $dado2['id_posto']; ?>"><?= $dado2['posto_sigla']; ?></option>
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
                           if(isset($quadro)){ 
                              foreach ($quadro as $dado2) : ?>
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
                           if(isset($especialidade)){ 
                              foreach ($especialidade as $dado2) : ?>
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
                           if(isset($om)){ 
                              foreach ($om as $dado2) : ?>
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
                        <input type="text" class="form-control" name="saram" id="saram" value="" >
                     </div>
                  </div>
                  
                  
                  
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="curso">Curso</label>
                        <select class="custom-select mr-sm-2" name="id_curso" >
                           <option value="">Selecione</option>
                           <?php 
                           if(isset($curso)){ 
                              foreach ($curso as $dado2) : ?>
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
                           if(isset($user)){ 
                              foreach ($user as $dado2) : ?>
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
                        <input type="password" class="form-control" name="password" id="password" value="" >
                     </div>
                  </div>
                  
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="password_confirm">Confirmar Senha</label>
                        <input type="password" class="form-control" name="password_confirm" id="password_confirm" value="" >
                     </div>
                  </div>

                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" value="" >
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

