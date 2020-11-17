<?= $this->extend('site/templates/base_template') ?>

<?= $this->section('content') ?>

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<div class="page-header pet-cover" data-parallax="true"></div>
<div class="main main-raised">
	<div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ml-auto mr-auto">
    	           <div class="pet-profile">
                        <div class="pet-profile-pic">
                        	<img src="data:image/jpeg;base64,<?=$ong->avatar?>">
                        </div>
                        <div class="name">
                            <h2 class="title"><?=$ong->nome?></h2>
                        </div>
						<h6><i class="fas fa-map-marker-alt"></i> <?=$cidade->nome?>/<?= $cidade->uf?></h6>
                    </div>
	            </div>
            </div>
            
			<div class="row">
				<div class="col-md-6 ml-auto mr-auto">
					<div class="card">
						<div class="pet-item">
							<div class="card-body text-left">
								<div class="pet-title">
									<h5 class="card-title"><i class="fas fa-share-alt"></i> <span style="color: purple;">Contato</span</h5>
								</div>
								<hr>
								<?php if(count($campos_contato)) : ?>
									
									<?php foreach ($campos_contato as $campo) { ?>
										<p class="card-text"><a class="external-link" href="<?=$ong->$campo?>" target="_blank"><i class="fas fa-desktop"></i> <?=$ong->$campo?></a></p><?php
									}

								?>

								<?php else : ?>

									<p class="card-text"><i class="fas fa-times"></i> Não há informações sobre o contato dessa ONG</p>

								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6 ml-auto mr-auto">
					<div class="card">
						<div class="pet-item">
							<div class="card-body text-left">
								<div class="pet-title">
									<h5 class="card-title"><i class="fas fa-paw"></i> <span style="color: purple;">Quem Somos</span</h5>
								</div>
								<hr>
								<p class="card-text">" Resgatar animais em situação de abandono, proporcionando o atendimento veterinário necessário até estarem prontos para a adoção, buscando conscientizar a população da importância da adoção responsável. "</p>
							</div>
						</div>
					</div>
				</div>

			</div>

            <div class="row">
				<div class="col">
					<h3 class="font-weight-bold"><i class="fas fa-search"></i> Nossos amigos à procura de um lar!</h3>
					<hr>
				</div>
			</div>

    		<div class="row">
				
				<?php foreach($listaPets as $key => $pet){ ?>

				<div class="col-12 col-md-4">
					<div class="card">
						<a href="<?=base_url("pet/".$pet->id_pet)?>">
							<div class="content">
								<div class="content-overlay"></div>

								<div class="pet-full-pic">
									<img src="data:image/jpeg;base64,<?= $pet->imagem?>" alt="Card image cap">
								</div>

								<div class="content-details fadeIn-bottom">
									<h3 class="content-title"><?= $pet->nome?></h3>
									<p class="content-text">Conhecer</p>
								</div>
							</div>
						</a>

						<div class="card-body">
							<div class="pet-title">
								<h5 class="card-title"><i class="fas fa-dog"></i> <?= $pet->nome?> </h5>
							</div>
							<hr>
							<div class="row">
								<div class="col">
								<p class="card-text"><i class="fas fa-history"></i><?= $pet->faixa_etaria_descricao?></p>
								</div>
								<div class="col">
								<p class="card-text">
									<i class="fas <?php if($pet->id_sexo == 1): echo 'fa-mars'; else: echo 'fa-venus'; endif; ?>"></i> <?=  $pet->sexo_descricao?>
								</p>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<p class="card-text"><i class="fas fa-dumbbell"></i><?= $pet->porte_descricao?></p>
								</div>
								<div class="col">
								</div>
							</div>
							<div class="row">
								<div class="col"><br>
									<p class="card-text text-center"> <i class="fas fa-map-marker-alt"></i><?= $pet->municipio_nome?>/<?= $pet->uf?></p>
								</div>
							</div>
						</div>
					</div>

				</div>

				<?php } ?>

			</div> 
        </div>
    </div>
</div>

<?= $this->endSection() ?>
