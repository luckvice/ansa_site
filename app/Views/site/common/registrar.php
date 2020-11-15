  <!-- Registrar -->
  <div class="modal fade" id="signupModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-signup" role="document">
      <div class="modal-content">
        <div class="card card-signup card-plain">
          <div class="modal-header">
            <h5 class="modal-title card-title">Cadastre - se para usar todos recursos!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i class="material-icons">clear</i>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-5 ml-auto">
                <div class="info info-horizontal ansa">
                  <div class="icon icon-rose">
                    <i class="material-icons">comment</i>
                  </div>
                  <div class="description">
                    <h4 class="info-title">Comente sua experiência</h4>
                    <p class="description purple">
                      Faça um depoimento sobre sua adoção.
                    </p>
                  </div>
                </div>

                <div class="info info-horizontal">
                  <div class="icon icon-primary">
                    <i class="material-icons">favorite</i>
                  </div>
                  <div class="description">
                    <h4 class="info-title">Faça parte deste projeto</h4>
                    <p class="description purple">
                      Cadastre um animalzinho Perdido ou abondonado.
                    </p>
                  </div>
                </div>

                <div class="info info-horizontal">
                  <div class="icon icon-info">
                    <i class="material-icons">loyalty</i>
                  </div>
                  <div class="description">
                    <h4 class="info-title">Maior privacidade e mais chances de adotar</h4>
                    <p class="description purple">
                      Veja perfils privados para adotar um animalzinho
                    </p>
                  </div>
                </div>
              </div>

              <div class="col-md-5 mr-auto">
                <form class="form" method="POST" action="<?= base_url('auth/cadastrarusuario'); ?>">
                  <div class="card-body">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text"><i class="material-icons">face</i></div>
                        </div>
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Seu nome" value="<?= old('nome'); ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text"><i class="material-icons">email</i></div>
                        </div>
                        <input type="mail" class="form-control" name="email" id="email" placeholder="Seu E-mail." value="<?= old('email'); ?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text"><i class="material-icons">phone</i></div>
                        </div>
                        <input type="text" class="form-control" name="telefone" id="telefone" placeholder="Telefone/Whats" value="<?= old('telefone'); ?>" required>
                      </div>
                    </div>
                    <div class="form-group text-left">
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text"><i class="material-icons">place</i></div>
                            <select id="estado" class="selectpicker text-left" data-style="select-with-transition" title="Selecione o estado" data-size="7" name="estado">
                                <option selected>Selecione o Estado</option>
                                <?php foreach($estados as $row=>$value){?>
                                <option value="<?= $value->id_estado?>"><?= $value->nome?></option>
                                <?php }?>
                            </select>
                        </div>
                      </div>
                    </div>
                    <div id="selectcidade" style="display:none" class="form-group text-left">
                          <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text"><i class="material-icons">house</i></div>
                                  <select id="cidade" class="text-left" data-style="select-with-transition" title="Selecione a cidade" data-size="7" name="cidade">
                                 
                            
                                </select>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text"><i class="material-icons">lock_outline</i></div>
                        </div>
                        <input type="password" placeholder="Senha" class="form-control" name="senha" id="senha" value="<?= old('senha'); ?>" required />
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text"><i class="material-icons">lock_outline</i></div>
                        </div>
                        <input type="password" placeholder="Repita a senha" class="form-control" name="senha_r" id="senha_r" value="<?= old('senha_r'); ?>" required />
                      </div>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="ong" id="ong">
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                        Sou proprietário/responsável por Ong <br> <small>Poderá cadastrar sua ong em seu perfil</small>
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="termos" id="termos">
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                        Concordo com os <a href="#something">termos de uso</a>.
                      </label>
                      <br>
                      <br>
                      <div class="g-recaptcha" name="g-recaptcha" data-sitekey="6LfkfN8ZAAAAAP2Ga-3TPRIOlUqVCYiAkOPMoh-i"></div>
                    </div>
                    <!-- Exibe Mensagem de erro Abre Modal -->
                    <?php
                    $erroeMail = session()->get('erro_mail');
                    if (isset($erroeMail['codigo']) == 1) :
                    ?>
                      <div class="alert alert-danger" role="alert">
                        <?= $erroeMail['mensagem']; ?>
                      </div>
                      <?= $this->section('openRegistrarModal') ?>
                      <script>
                        $('#signupModal').modal();
                      </script>
                      <?= $this->endSection() ?>
                    <?php endif; ?>

                    <?php
                    $erroeRegistrar = session()->get('erro_registrar');
                    if (isset($erroeRegistrar)) : ?>

                      <div class="alert alert-danger" role="alert">
                        <?= $erro_registrar->listErrors() ?>
                      </div>
                      <?= $this->section('openRegistrarModal') ?>
                      <script>
                        $('#signupModal').modal();
                      </script>
                      <?= $this->endSection() ?>
                    <?php endif; ?>
                  </div>
                  <div class="modal-footer justify-content-center">
                    <button type="submit" href="#pablo" class="btn btn-primary btn-round">Cadastrar - se</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>