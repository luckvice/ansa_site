<?= $this->extend('site/templates/base_template') ?>
<?= $this->section('content') ?>
<div class="page-header header-filter pet-cover2" style="display:none" data-parallax="true">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                    <h1 class="title">20 Novos Pets <br>Adicionados</h1>
                    <h4>Algum texto aqui</h4>
                 
            </div>
            <div class="col-md-5 ml-auto">
                    <h1 class="title">15 Pets  <br>Adotados</h1>
                    <h4>Ajude esse número a crescer!</h4>
                    <br>
            </div>
        </div>
        
    </div>
</div>
<div class="main">

<div class="section">
      <div class="container">
        <h2 class="section-title">Encontre o fofuxo perfeito</h2>
        <div class="row">
        <?= $this->include('site/paginas/pets_content/filtro_sidebar') ?>
          <div class="col-md-9">
            <div class="row">
            <div class="col-md-4">
                  <div class="card card-plain card-blog">
                    <div class="card-header card-header-image">
                      <a href="#pablo">
                        <img class="img img-raised" src="<?= base_url('assets/img/belinha.jpeg');?>">
                      </a>
                    <div class="colored-shadow" style="background-image: url(&quot;./assets/img/examples/blog7.jpg&quot;); opacity: 1;"></div></div>
                    <div class="card-body ">
                      <h6 class="card-category text-danger">
                        <i class="material-icons"></i> algum icon
                      </h6>
                      <h4 class="card-title">
                        <a href="#pablo">Belinha</a>
                      </h4>
                      <p class="card-description">
                                            Muito arteira
                           <a href="#pablo"> Conhecer </a>
                      </p>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <br>

      </div>
</div><!-- section -->
      
</div>
<?= $this->endSection() ?>
