<?= $this->extend('site/templates/base_template') ?>

<?= $this->section('content') ?>

<div class="page-header profile-page" data-parallax="true" style="height: 480px;background-image: url(&quot;../assets/img/dog_perfil.jpg&quot;);"></div>

<div class="main">
  <div class="container">
    <div class="section">
      <div id="nav-tabs" style="margin-top:-200px;">
                <h3></h3>
                <div class="row">
                  <div class="col-md-12">
                    <h3><small> </small></h3>
                    <!-- Tabs with icons on Card -->
                    <div class="card card-nav-tabs">
                      <div class="card-header card-header-primary">
                        <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                        <div class="nav-tabs-navigation">
                          <div class="nav-tabs-wrapper">
                            <ul class="nav nav-tabs" data-tabs="tabs">
                              <li class="nav-item">
                                <a class="nav-link active show" href="#profile" data-toggle="tab">
                                  <i class="material-icons">face</i>
                                  Meu Perfil
                                <div class="ripple-container"></div></a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#cadastrarPet" data-toggle="tab">
                                  <i class="material-icons">chat</i>
                                  Cadastrar um Pet
                                <div class="ripple-container"></div></a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#listarPetsCadastrados" data-toggle="tab">
                                <i class="fas fa-cat"></i>
                                  Listar pets
                                <div class="ripple-container"></div></a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#criarDepoimento" data-toggle="tab">
                                <i class="fas fa-cat"></i>
                                  Criar depoimento
                                <div class="ripple-container"></div></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="card-body ">
                        <div class="tab-content text-center">
                          <div class="tab-pane active show" id="profile">
                          <form>
                            <div class="form-row">
                            
                              <div class="form-group col-md-6">
                                <label for="inputEmail4">E-mail</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" value="">
                              </div>
                              <div class="form-group col-md-6">
                                <label for="senha">Senha</label>
                                <input type="password" class="form-control" id="senha" placeholder="Senha">
                              </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-2 ml-auto">
                                <label for="inputZip">CEP</label>
                                <input type="text" class="form-control" id="inputZip">
                              </div>
                              <div class="form-group col-md-6">
                                <label for="inputCity">Cidade</label>
                                <input type="text" class="form-control" id="inputCity">
                              </div>
                              <div class="form-group col-md-3">
                                <label for="inputState">Estado</label>
                                <select id="inputState" class="form-control">
                                  <option selected>Selecione..</option>
                                  <option>...</option>
                                </select>
                              </div>

                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                          </form>
                          </div>
                          <div class="tab-pane" id="cadastrarPet">
                            Aqui cadastrar Pet
                          </div>
                          <div class="tab-pane" id="listarPetsCadastrados">
                            Aqui listagem
                          </div>
                          <div class="tab-pane" id="criarDepoimento">
                            <div class="form-row">
                              <div class="form-group col-md-3">
                                <select class="selectpicker" data-style="select-with-transition" title="Selecione um pet" data-size="7">
                                    <option selected>Escolha o pet</option>
                                    <option value="2">Bruce</option>
                                    <option value="3">Spike</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-col">
                              <div class="form-group">
                              <label for="depoimento">Faça um depoimento sobre o Pet Adotado</label>
                              <textarea class="form-control" id="depoimento" rows="10"></textarea>
                              </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar depoimento</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End Tabs with icons on Card -->
                  </div>
                
                </div>
              </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>