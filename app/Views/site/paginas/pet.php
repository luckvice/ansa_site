<?= $this->extend('site/templates/base_template') ?>

<?= $this->section('content') ?>

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<div class="page-header pet-cover" data-parallax="true"></div>
<div class="main main-raised">
	<div class="profile-content">
		<div class="botao-adotar">	
			<ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="https://wa.me/+55519620-3669?text=ANSA Quero adotar o Niko, http://amigonaoseabandona.com.br/pets/niko, Meu Nome é Lucas Soares">
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
											<h4 class="card-title"><i class="fas fa-dumbbell"></i> Porte: M</h4>
											<span>|</span>
											<h4 class="card-title"><i class="fas fa-venus"></i> Fêmea</h4>
											<span>|</span>
											<h4 class="card-title" style="margin-bottom: .75rem !important;"><i class="fas fa-birthday-cake"></i> Jovem</h4>
										</div>
									</div>
								</div>
							</div>

							<h6>Mostre Nico aos seus amigos!</h6>
							<div class="sharethis-inline-share-buttons"></div>
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
									<img src="https://www.specialdog.com.br/assets/imgs/cao.png" class="rounded" style="width: 100%;">
								</div>
							</div>
						</div>
						<div class="tab-pane text-center gallery" id="works">
							<div class="row">
								<div class="col-md-12">
									<img src="https://www.deccanherald.com/sites/dh/files/article_images/2020/05/19/iStock-475989065-1115790551-1586363528.jpg" class="rounded" style="width: 100%;">
								</div>
							</div>
						</div>
						<div class="tab-pane text-center gallery" id="favorite">
							<div class="row">
								<div class="col-md-12">
									<img src="https://m.hindustantimes.com/rf/image_size_1200x900/HT/p2/2020/04/28/Pictures/_c238d9a8-8930-11ea-804e-137f71f5151d.jpg" class="rounded" style="width: 100%;">
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
