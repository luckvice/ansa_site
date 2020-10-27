
<?= $this->extend('site/templates/base_template') ?>
<?php $this->section('content'); ?>
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
                                <a class="nav-link <?php if(isset($tabPerfil)): echo $tabPerfil; endif; ?>" href="/perfil">
                                  <i class="material-icons">face</i>
                                  Meu Perfil
                                <div class="ripple-container"></div></a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link <?php if(isset($tabCadastrarPet)): echo $tabCadastrarPet; endif; ?>" href="/perfil/cadastrarpet">
                                  <i class="material-icons">forum</i>
                                  Cadastrar um Pet
                                <div class="ripple-container"></div></a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link <?php if(isset($tabListarPets)): echo $tabListarPets; endif; ?>" href="/perfil/listarpets">
                                <i class="material-icons">pets</i>
                                  Meus Pets Cadastrados
                                <div class="ripple-container"></div></a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link <?php if(isset($tabCriarDepoimento)): echo $tabCriarDepoimento; endif; ?>" href="/perfil/criardepoimento">
                                <i class="material-icons">comment</i>
                                  Criar depoimento
                                <div class="ripple-container"></div></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="card-body ">
                        <div class="tab-content text-center">
                        <?= $this->renderSection('content_perfil') ?>
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

<?php $this->endSection(); ?>