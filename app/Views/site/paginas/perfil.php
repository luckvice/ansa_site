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
                                <a class="nav-link" href="#messages" data-toggle="tab">
                                  <i class="material-icons">chat</i>
                                  Cadastrar um Pet
                                <div class="ripple-container"></div></a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#settings" data-toggle="tab">
                                <i class="fas fa-cat"></i>
                                  Listar pets
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
                                <label for="inputPassword4">Senha</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
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
                          <div class="tab-pane" id="messages">
                            <p> I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at.</p>
                          </div>
                          <div class="tab-pane" id="settings">
                            <p>I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. So when you get something that has the name Kanye West on it, it’s supposed to be pushing the furthest possibilities. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus.</p>
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