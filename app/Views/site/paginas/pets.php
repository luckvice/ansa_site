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
      <h2 class="section-title" style="margin-bottom: 20px;">• Encontre o amigo perfeito!</h2>
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
          <?php 

            if(count($listaPets)) : 
              foreach($listaPets as $key=>$value) { ?>
                <div class="col-md-4">
                  <div class="card">
                    <a href="<?=base_url("pet/".$value->id_pet)?>">
                      <div class="content">
                        <div class="content-overlay"></div>
                        <div class="pet-full-pic">
                          <img src="data:image/jpeg;base64,<?= $value->imagem?>" alt="Card image cap">
                        </div>
                        <div class="content-details fadeIn-bottom">
                          <h3 class="content-title"><?= $value->nome?></h3>
                          <p class="content-text">Conhecer</p>
                        </div>
                      </div>
                    </a>
                    <div class="card-body">
                      <div class="pet-title">
                        <h5 class="card-title"><i class="fas <?php if($value->id_especie == 1): echo 'fa-dog'; else: echo 'fa-cat'; endif; ?>"></i> <?= $value->nome?> </h5>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col">
                          <p class="card-text"><i class="fas fa-history"></i><?= $value->faixa_etaria_descricao?></p>
                        </div>
                        <div class="col">
                          <p class="card-text">
                            <i class="fas <?php if($value->id_sexo == 1): echo 'fa-mars'; else: echo 'fa-venus'; endif; ?>"></i> <?=  $value->sexo_descricao?>
                          </p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <p class="card-text"><i class="fas fa-dumbbell"></i><?= $value->porte_descricao?></p>
                        </div>
                        <div class="col">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col"><br>
                          <p class="card-text text-center"> <i class="fas fa-map-marker-alt"></i><?= $value->municipio_nome?>/<?= $value->uf?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
          <?php 
              }
            else : ?>
              <div class="col-md-12 text-center">
                <h2 class="title">Não há pets disponíveis no momento =(</h2>
                <h5 class="description">Gostaria de receber aviso quando chegar um novo amiguinho? <a href="#"> Clique aqui!</a></h5>
              </div>
          <?php
            endif;
          ?>
          </div>
          <div class="row">
            <div class="col text-center" style="display: flex;">
              <nav aria-label="Page navigation" style="margin: 0 auto;">
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