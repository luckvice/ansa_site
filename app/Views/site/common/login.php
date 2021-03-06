  <!-- LOGIN -->
  <div class="modal fade" id="loginModal" tabindex="-1" role="">
    <div class="modal-dialog modal-login" role="document">
      <div class="modal-content">
        <div class="card card-signup card-plain">
          <div class="modal-header">
            <div class="card-header card-header-primary text-center">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                <i class="material-icons">clear</i>
              </button>

              <h4 class="card-title">Log in</h4>
            </div>
          </div>

          <?= form_open('auth/login') ?>
          <div class="modal-body">

            <p class="description text-center"><br>Insira suas credenciais</p>
            <div class="card-body">


              <div class="form-group bmd-form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="material-icons">email</i></div>
                  </div>
                  <input type="email" name="email" class="form-control" placeholder="Email" value="<?= old('email'); ?>">
                </div>
              </div>

              <div class="form-group bmd-form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="material-icons">lock_outline</i></div>
                  </div>
                  <input type="password" name="senha" placeholder="Senha" class="form-control" value="<?= old('senha'); ?>">
          
                </div>
                <br>
                <div class="input-group text-center">
                
                  <a id="esqueciSenha" class="esqueciSenha" data-toggle="collapse" href="#colesqueciSenha" aria-expanded="false" aria-controls="colesqueciSenha" style="margin: 0 auto;">Esqueci Minha senha</a>
                </div>
              </div>
              <div class="text-center collapse" id="colesqueciSenha">
                
                <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons">email</i></div>
                    </div>
                    <input id="esqueci_email" type="email" name="esqueci_email" class="form-control" placeholder="Informe o Email para recuperação" value="<?= old('email'); ?>">
                </div>

                <button id="solicitarSenha" type="button" class="btn btn-primary" style="margin-top: 20px;">Enviar solicitação</button> 
                
                <div id="resposta" role="alert" > </div>
              </div>
              <!-- Exibe Mensagem de erro Abre Modal -->
              <?php
              $erroLogin = session()->get('erro_login');
              if (isset($erroLogin['codigo']) == 1) :
              ?>
                <div class="alert alert-danger" role="alert">
                  <?= $erroLogin['mensagem']; ?>
                </div>
                <?= $this->section('openLoginModal') ?>
                <script>
                  $('#loginModal').modal();
                </script>
                <?= $this->endSection() ?>
              <?php endif; ?>
              <?php if (isset($erro)) : ?>
                <div class="alert alert-danger" role="alert">
                  <?= $erro->listErrors() ?>
                </div>
                <?= $this->section('openLoginModal') ?>
                <script>
                  $('#loginModal').modal();
                </script>
                <?= $this->endSection() ?>
              <?php endif; ?>
            </div>
          </div>
          <div class="modal-footer justify-content-center">
            <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Acessar meu perfil</button>
          </div>

          <?= form_close(); ?>
        </div>
      </div>
    </div>
  </div>