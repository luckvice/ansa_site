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
          <form class="form" method="POST" action="<?= base_url('auth/login'); ?>">
          <div class="modal-body">
            
              <p class="description text-center"><br>Insira suas credenciais</p>
              <div class="card-body">


                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons">email</i></div>
                    </div>
                    <input type="text" class="form-control" placeholder="Email...">
                  </div>
                </div>

                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons">lock_outline</i></div>
                    </div>
                    <input type="password" placeholder="Senha" class="form-control">
                  </div>
                </div>
              </div>
            
          </div>
          <div class="modal-footer justify-content-center">
            <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Acessar meu perfil</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>