<?= $this->extend('site/templates/base_template') ?>

<?= $this->section('content') ?>
  <!-- FILTROS -->
  <div class="page-header"
    style="background-image: url('<?= $backgroud ?>');">
    <!-- https://cdn.hipwallpaper.com/i/45/92/MdvtEQ.jpg-->
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto text-center">
          <h1 class="title">Que tipo de <span style="color: #d6a7ff;">amigo</span> está procurando?</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 ml-auto mr-auto text-center">
          <img class="home-pet-button" src="<?=base_url('assets/img/dog.png')?>" alt="Botão de Cachorro" data-toggle="tooltip" data-placement="top" title="Cachorrinho">
          <img class="home-pet-button" src="<?=base_url('assets/img/cat.png')?>" alt="Botão de Gato" data-toggle="tooltip" data-placement="top" title="Gatinho">
        </div>
      </div>
      <div class="row" style="margin-top: 20px;">
        <div class="col-md-8 ml-auto mr-auto text-center">
          <h5 class="font-weight-bold">Essa é a chance de encontrar muitos amigos que estão à sua espera! Clique em uma das opções e procure pelo seu novo parceiro!</h5>
        </div>
      </div>
    </div>
  </div>
  <div class="main">
  <?= $this->include('site/paginas/home_content/ongs') ?>
  </div>
<?= $this->endSection() ?>

