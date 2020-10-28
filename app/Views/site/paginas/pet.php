<?= $this->extend('site/templates/base_template') ?>
<?= $this->section('content') ?>

<div class="page-header header-filter pet-cover" data-parallax="true"></div>
<div class="main main-raised">
	<div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
    	           <div class="pet-profile">
                        <div class="pet-profile-pic">
                        	<img src="https://blog.humanesociety.org/wp-content/uploads/2017/12/india-dog-e1512757920691.jpg">
                        </div>
                        <div class="name">
                            <h3 class="title">Nico</h3>
							<h6>Mostre o Nico aos seus amigos!</h6>
							<a href="#pablo" class="btn btn-just-icon btn-link btn-facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#pablo" class="btn btn-just-icon btn-link btn-instagram"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
	            </div>
            </div>
            <div class="description text-center pet-description">
                <p>"Oi gente! Quando eu fui resgatada, estava em um estado bem ruinzinho, me coçando muito e com uma fome do cão! Como vivi na rua, não sabia ao certo em quem confiar, então era bem arisca. Mas aos poucos, com um petisco aqui e outro ali, os voluntários foram me conquistando. Agora o que eu mais preciso é de uma família que me encha de amor e me mostre como é bom passear no parque, receber carinhos e dormir de conchinha! Você pode ser minha família? Vem me conhecer!"</p>
            </div>
			<div class="row">
				<div class="col-md-6 ml-auto mr-auto">
                    <div class="profile-tabs">
                      	<ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
	                        <li class="nav-item">
	                            <a class="nav-link active" href="#studio" role="tab" data-toggle="tab">
	                              	<i class="material-icons">pets</i>
	                              	Foto 1
	                            </a>
	                        </li>
                        	<li class="nav-item">
                            	<a class="nav-link" href="#works" role="tab" data-toggle="tab">
                              		<i class="material-icons">camera_alt</i>
                                	Foto 2
                            	</a>
	                        </li>
	                        <li class="nav-item">
	                            <a class="nav-link" href="#favorite" role="tab" data-toggle="tab">
	                              	<i class="material-icons">favorite</i>
	                                Foto 3
	                            </a>
	                        </li>
                      	</ul>
                    </div>
	    		</div>
        	</div>
    
			<div class="tab-content tab-space">
				<div class="tab-pane active text-center gallery" id="studio">
					<div class="row">
						<div class="col-md-12">
							<img src="https://www.specialdog.com.br/assets/imgs/cao.png" class="rounded">
						</div>
					</div>
				</div>
				<div class="tab-pane text-center gallery" id="works">
					<div class="row">
						<div class="col-md-12">
							<img src="https://www.deccanherald.com/sites/dh/files/article_images/2020/05/19/iStock-475989065-1115790551-1586363528.jpg" class="rounded">
						</div>
					</div>
				</div>
				<div class="tab-pane text-center gallery" id="favorite">
					<div class="row">
						<div class="col-md-12">
							<img src="https://m.hindustantimes.com/rf/image_size_1200x900/HT/p2/2020/04/28/Pictures/_c238d9a8-8930-11ea-804e-137f71f5151d.jpg" class="rounded">
						</div>
					</div>
				</div>
			</div>    
        </div>
    </div>
</div>

<?= $this->endSection() ?>
