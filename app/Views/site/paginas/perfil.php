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
                                  Meus Pets Cadastrados
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
                          <!-- Include Tab Content Perfil Usuario -->
                          <?= $this->include('site/paginas/perfil_content/perfil_usuario') ?>
                          <!-- Include Tab Content Cadastrar Pet-->
                          <?= $this->include('site/paginas/perfil_content/perfil_cadastrarPet') ?>
                          <!-- Include Tab Content Listar Pets-->
                          <?= $this->include('site/paginas/perfil_content/perfil_listarPets') ?>
                          <!-- Include Tab Content Criar depoimento-->
                          <?= $this->include('site/paginas/perfil_content/perfil_criarDepoimento') ?>
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