<?= $this->extend('site/templates/base_template') ?>
<?= $this->section('content') ?>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Atenção</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Infelizmente não encontramos o pet que você queria, gostaria que nossa equipe mande sugestões para você ?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não Obrigado</button>
        <button type="button" class="btn btn-primary">Eu quero</button>
      </div>
    </div>
  </div>
</div>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<div class="page-header header-filter pet-cover2" style="display:none" data-parallax="true">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1 class="title">20 Novos Pets <br>Adicionados</h1>
        <h4>Algum texto aqui</h4>

      </div>
      <div class="col-md-5 ml-auto">
        <h1 class="title">15 Pets <br>Adotados</h1>
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
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="display:none">
        Launch demo modal
      </button>
      <div class="row">
        <div class="col-md-12">
          <?= $this->include('site/paginas/pets_content/filtro_pets') ?>
        </div>

        <div class="col-md-12">
          <div class="row">
            <div class="col-md-4">
              <div class="card" style="width: 20rem;">
                <a href="/pet/1">
                  <div class="content">
                    <div class="content-overlay"></div>
                    <img class="card-img-top content-image" src="<?= base_url('assets/img/belinha.jpeg') ?>" alt="Card image cap">
                    <div class="content-details fadeIn-bottom">
                      <h3 class="content-title">Belinha</h3>
                      <p class="content-text">Conhecer</p>
                    </div>
                  </div>
                </a>
                <div class="card-body">
                  <div class="pet-title">
                    <h5 class="card-title"><i class="fas fa-dog"></i> Belinha </h5>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col">
                      <p class="card-text"><i class="fas fa-history"></i>Jovem</p>
                    </div>
                    <div class="col">
                      <p class="card-text">
                        <i class="fas fa-venus" style="color:pink"></i> Fêmea
                      </p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <p class="card-text"><i class="fas fa-dumbbell"></i>Pequeno</p>
                    </div>
                    <div class="col">

                    </div>
                  </div>
                  <div class="row">
                    <div class="col"><br>
                      <p class="card-text text-center"> <i class="fas fa-map-marker-alt"></i>Porto Alegre/RS</p>
                    </div>
                  </div>
                </div>
              </div>

            </div>

          </div>
          <div class="row">
            <div class="col text-center">
              <nav aria-label="Page navigation">
                <ul class="pagination">
                  <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <br>

    </div>
  </div><!-- section -->

</div>
<?= $this->endSection() ?>