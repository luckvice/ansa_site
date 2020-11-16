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
							<div class="card">
			    				<div class="pet-item">
									<div class="card-body text-left ">
										<div class="pet-title justify-content-between">
											<h4 class="card-title"><a href="www.facebook.com/ongdofelipe" target="_blank"><i class="fab fa-facebook-f"></i> facebook.com/ongdofelipe </a></h4>
											<span>|</span>
											<h4 class="card-title"><a href="www.facebook.com/ongdofelipe" target="_blank"><i class="fab fa-instagram"></i> instagram.com/ongdofelipe</a></h4>
											<span>|</span>
											<h4 class="card-title" style="margin-bottom: .75rem !important;"><a href="www.facebook.com/ongdofelipe" target="_blank"><i class="fab fa-twitter"></i> twitter.com/ongdofelipe</a></h4>
										</div>
									</div>
								</div>
							</div>
                        </div>
                    </div>
	            </div>
            </div>
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto"><hr></div>
            </div>
            <div class="row">
            	<div class="col-md-8 ml-auto mr-auto">
            		<h4 class="text-center title">Um pouco sobre nós!</h4>
            		<div class="description text-center pet-description">
		                <p>"Aqui vai a descrição da ONG"</p>
		            </div>
            	</div>
            </div>

            <div class="row" style="margin-bottom: 30px;">
                <div class="col-md-6 ml-auto mr-auto"><hr></div>
            </div>

			<div class="row">
				
        	</div>
    		
    		<div class="row">
				
			</div>  
        </div>
    </div>
</div>

<?= $this->endSection() ?>
