<?= $this->extend('site/templates/base_template') ?>
<?= $this->section('content') ?>

<div class="modal fade" tabindex="-1" role="dialog" id="solicitarAdocao">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title font-weight-bold">Adote <?= $nome?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="">
				<div class="modal-body">
					<div class="form-row">
					<div class="form-group col-md-12">
							<label class="control-label" for="senha">Informe seu Nome </label>
							<input type="text" class="form-control is-invalid" name="nome_interessado" id="nome_interessado" required>
						</div>
						<div class="form-group col-md-12">
							<label class="control-label" for="telefone_interessado">Informe seu Whatsapp para o contato do tutor do(a) <?= $nome?></label>
							<input type="phone" class="form-control is-invalid" name="telefone" id="telefone_interessado" max-lengh="14" required>
							<input type="hidden" name="id_pet" id="id_pet" value="<?= $id_pet?>"/>
							<input type="hidden" name="nome_pet" id="nome_pet" value="<?= $nome?>"/>
							<input type="hidden" name="nome_protetor" id="nome_protetor" value="<?= $nome_protetor?>"/>
							<input type="hidden" name="pet_genero" id="pet_genero" value="<?= $genero?>"/>
							
						</div>
						<div class="form-group col-md-12">
							<label class="control-label" for="senha">E-mail (Opcional)</label>
							<input type="email" class="form-control is-invalid" name="email_interessado" id="email_interessado">
						</div>
						<div class="form-group col-md-12">
							<label class="control-label" for="msg_opcional">Recado (Opcional)</label>
							<textarea class="form-control" name="msg_opcional" id="msg_opcional" rows="3"></textarea>
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
					<button type="button" class="btn btn-primary solicitar_adocao">Solicitar Adoção</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<div class="page-header pet-cover" data-parallax="true"></div>
<div class="main main-raised">
	<div class="profile-content">
		<div class="botao-adotar">	
			<ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                <li class="nav-item">
                    <!--<a class="nav-link active" href="https://wa.me/+55519620-3669?text=ANSA Quero adotar o Niko, http://amigonaoseabandona.com.br/pets/niko, Meu Nome é Lucas Soares">-->
					<?php
						if($adotado == 0) :
					?>
						<a class="nav-link active" href="#" data-toggle="modal" data-target="#solicitarAdocao">
							<i class="material-icons">favorite</i>
							Adotar
						</a>
					<?php
						else :
					?>
						<a class="nav-link active tag-adotado">
							<i class="material-icons">check</i>
							Adotado
						</a>
					<?php
						endif;
					?>
                </li>
            </ul>
		</div>
        <div class="container">
            <div class="row">
                <div class="col-md-7 ml-auto mr-auto">
    	           <div class="pet-profile">
                        <div class="pet-profile-pic">
                        	<img src="data:image/jpeg;base64,<?=$imagem?>">
                        </div>
                        <div class="name">
                            <h2 class="title"><?=$nome?></h2>
							<div class="card">
			    				<div class="pet-item">
									<div class="card-body text-left ">
										<div class="pet-title justify-content-between">
											<h4 class="card-title"><i class="fas fa-dumbbell"></i> Porte: <?=$porte?></h4>
											<span>|</span>
											<h4 class="card-title"><i class="<?=$icon?>"></i> <?=$sexo?></h4>
											<span>|</span>
											<h4 class="card-title" style="margin-bottom: .75rem !important;"><i class="fas fa-birthday-cake"></i> <?=$faixa_etaria?></h4>
										</div>
									</div>
								</div>
							</div>
							<h6>Mostre <?=$nome?> aos seus amigos!</h6>
							<div class="sharethis-inline-share-buttons" style="display: flex; justify-content: center; margin: 20px;"></div>
						<!--	<a href="#pablo" class="btn btn-just-icon btn-link btn-facebook"><i class="fab fa-facebook"></i></a>
                            <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#pablo" class="btn btn-just-icon btn-link btn-instagram"><i class="fab fa-instagram"></i></a> -->
                        </div>
                    </div>
	            </div>
            </div>
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto"><hr></div>
            </div>
            <div class="row">
            	<div class="col-md-4 ml-auto mr-auto">
            		<div class="card">
	    				<div class="pet-item">
							<div class="card-body text-left">
								<div class="pet-title">
									<h5 class="card-title"><i class="fas fa-paw"></i> <span style="color: purple;">Características</span</h5>
								</div>
								<hr>
								<?php
								$count_caracteristicas = 0;
								foreach($caracteristica as $key=>$value) {
									if($value[1] == 1) { 
										$count_caracteristicas++; 
										?><p class="card-text"><i class="<?=$value[0]?>"></i><?=$key?></p><?php	
									}
								}
								if(!$count_caracteristicas) :
									?><p class="card-text"><i class="fas fa-times"></i> Não há informações sobre as características desse animal</p><?php
								endif;
								?>
							</div>
						</div>
					</div>
            	</div>
            	<div class="col-md-4 ml-auto mr-auto">
            		<div class="card">
	    				<div class="pet-item">
							<div class="card-body text-left">
								<div class="pet-title">
									<h5 class="card-title"><i class="fas fa-heartbeat"></i> <span style="color: purple;">Saúde</span></h5>
								</div>
								<hr>
								<?php
									$count_saude = 0;
									foreach($saude as $key=>$value){
										if($value[1] == 1){ 
											$count_saude++; 
											?><p class="card-text"><i class="<?=$value[0]?>"></i><?=$key?></p><?php	
										}
									}
									if(!$count_saude) : ?>
										<p class="card-text"><i class="fas fa-times"></i> Não há informações sobre a saúde desse animal</p><?php
									endif;
								?>
							</div>
						</div>
					</div>
            	</div>
            	<div class="col-md-4 ml-auto mr-auto">
            		<div class="card">
	    				<div class="pet-item">
							<div class="card-body text-left">
								<div class="pet-title">
									<h5 class="card-title"><i class="fas fa-map-marker-alt"></i> <span style="color: purple;">Onde estou</span></h5>
								</div>
								<hr>
								<p class="card-text"><i class="fas fa-map-marker-alt"></i><?=$cidade?>/<?=$uf?></p>
								<p class="card-text"><i class="fas fa-user"></i>Protetor: <?=$nome_protetor?></p>
							</div>
						</div>
					</div>
            	</div>
            	<div class="col-md-8 ml-auto mr-auto">
            		<h4 class="text-center title">Um pouco sobre mim!</h4>
            		<div class="description text-center pet-description">
		                <p>"<?=$descricao?>"</p>
		            </div>
            	</div>
            </div>
            <div class="row" style="margin-bottom: 30px;">
                <div class="col-md-6 ml-auto mr-auto"><hr></div>
            </div>
			
    		<div class="row">
				<div class="col-12 col-md-6 ml-auto mr-auto" style="margin-bottom: 40px; text-align: center;">

					<?php 
						if(count($imagens_pet)) :
					?>
					<h3 class="text-center title" style="margin-top: 0px !important; margin-bottom: 30px;"><i class="fas fa-camera"></i> Minhas fotos!</h3>
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<?php 
								for ($i = 0; $i < count($imagens_pet); $i++) { ?>
									
									<li data-target="#carouselExampleIndicators" data-slide-to="<?=$i?>" <?php if(!$i) echo 'class="active"';?> ></li>
							<?php
								}
							?>
						</ol>
						<div class="carousel-inner">
							<?php 
								foreach ($imagens_pet as $key => $imagem) { ?>
									
									<div class="carousel-item <?php if(!$key) echo 'active'?>">
										<img src="data:image/jpeg;base64,<?= $imagem?>" class="rounded" style="width: 100%;">
									</div>
							<?php
								}
							?>
						</div>
						<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Anterior</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Próximo</span>
						</a>
					</div>
					<?php else : ?>
						<h4><b>ohh :( O protetor não postou mais fotos</b></h4>
					<?php endif; ?>
				</div>
			</div>  
        </div>
    </div>
</div>

<?= $this->endSection() ?>
