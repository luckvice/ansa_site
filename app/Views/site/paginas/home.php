<?= $this->extend('site/templates/base_template') ?>

<?= $this->section('content') ?>
  <!-- FILTROS -->
  <div class="page-header header-filter"
    style="background-image: url('https://template94868.motopreview.com//mt-demo/94800/94868/mt-content/uploads/2020/01/mt-1962-content-bg01.jpg');">
    <!-- https://cdn.hipwallpaper.com/i/45/92/MdvtEQ.jpg-->
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto text-center">
          <h1 class="title"> Encontre um amigo</h1>
          <h4>Essa é a chance de encontrar muitos amigos que estão a sua espera, use os filtros abaixo se quiser
            enontrar aquele amigo(a)
            especial!</h4>
        </div>
        <?= $this->include('site/paginas/home_content/destaque_filtro') ?>
      </div>
    </div>
  </div>
<?= $this->include('site/paginas/home_content/ongs') ?>
<?= $this->endSection() ?>

