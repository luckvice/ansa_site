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
							<input type="text" class="form-control is-invalid" name="telefone" id="telefone_interessado" required>
							<input type="hidden" name="id_pet" id="id_pet" value="<?= $id_pet?>"/>
							<input type="hidden" name="nome_pet" id="nome_pet" value="<?= $nome?>"/>
							<input type="hidden" name="nome_protetor" id="nome_protetor" value="<?= $nome_protetor?>"/>
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
					<a class="nav-link active" href="#" data-toggle="modal" data-target="#solicitarAdocao">
                		<i class="material-icons">favorite</i>
                        Adotar
                    </a>
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
									<h5 class="card-title"><i class="fas fa-paw"></i> Características</h5>
								</div>
								<hr>
								<?php
								foreach($caracteristica as $key=>$value){
									if($value[1] == 1){ ?>
										<p class="card-text"><i class="<?=$value[0]?>"></i><?=$key?></p>		
						    <?php	}
								}
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
									<h5 class="card-title"><i class="fas fa-heartbeat"></i> Saúde</h5>
								</div>
								
								<hr>

								<?php
								foreach($saude as $key=>$value){
									if($value[1] == 1){ ?>
										<p class="card-text"><i class="<?=$value[0]?>"></i><?=$key?></p>		
						    <?php	}
								}
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
									<h5 class="card-title"><i class="fas fa-map-marker-alt"></i> Onde estou</h5>
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
				<div class="col-md-6 ml-auto mr-auto">
                    <div class="profile-tabs">
                      	<ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
	                        <li class="nav-item">
	                            <a class="nav-link active" href="#studio" role="tab" data-toggle="tab">
	                              	<i class="material-icons">photo</i>
	                              	Olha eu!
	                            </a>
	                        </li>
                        	<li class="nav-item">
                            	<a class="nav-link" href="#works" role="tab" data-toggle="tab">
                              		<i class="material-icons">camera_alt</i>
                                	Olá!
                            	</a>
	                        </li>
	                        <li class="nav-item">
	                            <a class="nav-link" href="#favorite" role="tab" data-toggle="tab">
	                              	<i class="material-icons">photo</i>
	                                Amei essa!
	                            </a>
	                        </li>
                      	</ul>
                    </div>
	    		</div>
        	</div>
    		
    		<div class="row">
				<div class="col-12 col-md-6 ml-auto mr-auto">

					<div class="tab-content tab-space">
						<div class="tab-pane active text-center gallery" id="studio">
							<div class="row">
								<div class="col-md-12">
									<?php 
									if(!isset($img_opcional1)):
										echo '<p><h4><b>ohh :( O protetor não postou mais fotos</b></h4></p>';
									else:
									?>
										<img src="data:image/jpeg;base64,<?= $img_opcional1?>" class="rounded" style="width: 100%;">
									<?php endif?>
								</div>
							</div>
						</div>
						<div class="tab-pane text-center gallery" id="works">
							<div class="row">
								<div class="col-md-12">
								<?php 
									if(!isset($img_opcional2)):
										echo '<p><h4><b>ohh :( O protetor não postou mais fotos</b></h4></p>';
									else:
									?>
										<img src="data:image/jpeg;base64,<?= $img_opcional2?>" class="rounded" style="width: 100%;">
									<?php endif?>
								</div>
							</div>
						</div>
						<div class="tab-pane text-center gallery" id="favorite">
							<div class="row">
								<div class="col-md-12">
								<?php 
									if(!isset($img_opcional3)):
										echo '<p><h4><b>ohh :( O protetor não postou mais fotos</b></h4></p>';
									else:
									?>
										<img src="data:image/jpeg;base64,<?= $img_opcional3?>" class="rounded" style="width: 100%;">
									<?php endif?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>  
        </div>
    </div>
</div>

<?= $this->endSection() ?>
