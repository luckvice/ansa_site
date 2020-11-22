<?= $this->extend('site/templates/base_template') ?>
<?= $this->section('content') ?>
<!-- Modal -->
<div class="modal fade" id="modalRecomendar" tabindex="-1" role="dialog" aria-labelledby="modalRecomendar" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title font-weight-bold">Recomendação de pets</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form method="POST" action="">
				<div class="modal-body">
					<div class="form-row">
						<div class="form-group col-md-12 bmd-form-group">
							<label class="control-label bmd-label-static" for="telefone_interessado">Informe seu telefone/Whatsapp</label>
							<input type="phone" class="form-control is-invalid" name="telefone" id="telefone_interessado" max-lengh="14" required="" maxlength="15">
							<input type="hidden" name="id_pet" id="id_pet" value="72">
							<input type="hidden" name="nome_pet" id="nome_pet" value="Pudin">
							<input type="hidden" name="nome_protetor" id="nome_protetor" value="Luckx">
							<input type="hidden" name="pet_genero" id="pet_genero" value="o">
							
						</div>
						<div class="form-group col-md-12 bmd-form-group">
							<label class="control-label bmd-label-static" for="senha">E-mail (Opcional)</label>
							<input type="email" class="form-control is-invalid" name="email_interessado" id="email_interessado">
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="alert alert-success" style="display:none" role="alert">
								<div class="response_sucesso">
							
								</div>
							</div>
							<div class="alert alert-danger" style="display:none" role="alert">
								<div class="response_erro"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary solicitar_recomendacao">Solicitar recomendação</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				</div>
			</form>
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
            else :
            $proximo = -1;
            ?>

              <div class="col-md-12 text-center">
                <h2 class="title">Não há pets disponíveis no momento =(</h2>
                <h5 class="description">Gostaria de receber aviso quando chegar um novo amiguinho? <a href="#" data-toggle="modal" data-target="#modalRecomendar"> Clique aqui!</a></h5>
              </div>
          <?php
            endif;
          ?>
          </div>
          <div class="row">
            <div class="col text-center" style="display: flex;">

              <nav aria-label="Page navigation" style="margin: 0 auto;">
              <?php if(!empty($anterior)){

                ?>
                <a href="<?= base_url('pets/'.$anterior)?>" id="verMais" class="btn btn-primary">Anterior</a> | 
                <?php }?>
            
                <?php if(!empty($proximo) && $proximo != -1){

              ?>
              <a href="<?= base_url('pets/'.$proximo)?>" id="verMais" class="btn btn-primary">Proximo</a>
                <?php }?>
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