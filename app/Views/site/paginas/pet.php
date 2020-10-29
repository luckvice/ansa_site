<?= $this->extend('site/templates/base_template') ?>

<?= $this->section('content') ?>

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<div class="page-header pet-cover" data-parallax="true"></div>
<div class="main main-raised">
	<div class="profile-content">
		<div style="position: absolute; right: 0px; top: 15px;">	
			<ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#studio" role="tab" data-toggle="tab">
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
                        	<img src="https://blog.humanesociety.org/wp-content/uploads/2017/12/india-dog-e1512757920691.jpg">
                        </div>
                        <div class="name">
                            <h2 class="title">Nico</h2>
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

							<a href="#pablo" class="btn btn-just-icon btn-link btn-facebook"><i class="fab fa-facebook"></i></a>
                            <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#pablo" class="btn btn-just-icon btn-link btn-instagram"><i class="fab fa-instagram"></i></a>
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
								
								<p class="card-text"><i class="fas fa-paw"></i>Dócil</p>
								<!--<p class="card-text"><i class="fas fa-exclamation-triangle"></i>Agressivo</p>-->
								<!--<p class="card-text"><i class="fas fa-couch"></i>Calmo</p>-->
								<p class="card-text"><i class="fas fa-hand-peace"></i>Sociável</p>
								<!--<p class="card-text"><i class="fas fa-running"></i>Independente</p>-->
								<!--<p class="card-text"><i class="fas fa-heart-broken"></i>Carente</p>-->
								<!--<p class="card-text"><i class="fas fa-sad-tear"></i>Assustado</p>-->
								<p class="card-text"><i class="fas fa-bone"></i>Brincalhão</p>
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

								<p class="card-text"><i class="fas fa-syringe"></i>Vacinado</p>
								<p class="card-text"><i class="fas fa-capsules"></i>Vermifugado</p>
								<p class="card-text"><i class="fas fa-briefcase-medical"></i>Cadastrado</p>

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
								
								<p class="card-text"><i class="fas fa-map-marker-alt"></i>Porto Alegre/RS</p>
								<p class="card-text"><i class="fas fa-user"></i>Felipe Pereira</p>
								<p class="card-text"><i class="fas fa-phone-alt"></i>(51) 99999-8888</p>
							</div>
						</div>
					</div>
            	</div>
            	<div class="col-md-8 ml-auto mr-auto">
            		<h4 class="text-center title">Um pouco sobre mim!</h4>
            		<div class="description text-center pet-description">
		                <p>"Oi gente! Quando eu fui resgatada, estava em um estado bem ruinzinho, me coçando muito e com uma fome do cão! Como vivi na rua, não sabia ao certo em quem confiar, então era bem arisca. Mas aos poucos, com um petisco aqui e outro ali, os voluntários foram me conquistando. Agora o que eu mais preciso é de uma família que me encha de amor e me mostre como é bom passear no parque, receber carinhos e dormir de conchinha! Você pode ser minha família? Vem me conhecer!"</p>
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
