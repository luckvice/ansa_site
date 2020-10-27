<?= $this->extend('site/paginas/perfil_content/perfil_template') ?>
<?php $this->section('content_perfil'); ?>

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


<div class="tab-pane active show" id="listarPetsCadastrados">
<form>
    <div class="container">
    	<div class="row">
    		<div class="col-12 col-lg-6">
    			<div class="card">
    				<div class="pet-item">
						<img class="card-img-top pet-pic" src="<?= base_url('assets/img/belinha.jpeg'); ?>" alt="Card image cap">
						<div class="card-body text-left">
							<h5 class="card-title"><i class="fas fa-dog"></i>Belinha</h5>
							<hr>
							<p class="card-text"><i class="fas fa-venus"></i>Fêmea</p>
							<p class="card-text"><i class="fas fa-paw"></i>Dócil</p>
							<p class="card-text"><i class="fas fa-dumbbell"></i>Pequeno</p>
							<p class="card-text"><i class="fas fa-history"></i>Jovem</p>
							<p class="card-text"><i class="fas fa-map-marker-alt"></i>Porto Alegre/RS</p>
						</div>
					</div>
					<hr>
					<div class="pet-buttons">
						<a href="/perfil/pet/1" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Visualizar informações do pet">Ver</a>
						<button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Marcar como adotado">Adotado</button>
						<button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="remover pet do site">Remover</button>
					</div>
				</div>
    		</div>
    		<div class="col-12 col-lg-6">
    			<div class="card">
    				<div class="pet-item">
						<img class="card-img-top pet-pic" src="https://www.specialdog.com.br/assets/imgs/cao.png" alt="Card image cap">
						<div class="card-body text-left">
							<h5 class="card-title"><i class="fas fa-dog"></i>Nico <span class="badge badge-success">Adotado</span></h5>
							<hr>
							<p class="card-text"><i class="fas fa-mars"></i>Macho</p>
							<p class="card-text"><i class="fas fa-paw"></i>Dócil</p>
							<p class="card-text"><i class="fas fa-dumbbell"></i>Pequeno</p>
							<p class="card-text"><i class="fas fa-history"></i>Jovem</p>
							<p class="card-text"><i class="fas fa-map-marker-alt"></i>Porto Alegre/RS</p>
						</div>
					</div>
					<hr>
					<div class="pet-buttons">
					<a href="/perfil/pet/1" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Visualizar informações do pet">Ver</a>
						<button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Marcar como adotado" disabled>Adotado</button>
						<button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="remover pet do site" disabled>Remover</button>
					</div>
				</div>
    		</div>
    		<div class="col-12 col-lg-6">
    			<div class="card">
    				<div class="pet-item">
						<img class="card-img-top pet-pic" src="https://www.specialdog.com.br/assets/imgs/cao.png" alt="Card image cap">
						<div class="card-body text-left">
							<h5 class="card-title"><i class="fas fa-dog"></i>Nico</h5>
							<hr>
							<p class="card-text"><i class="fas fa-mars"></i>Macho</p>
							<p class="card-text"><i class="fas fa-paw"></i>Dócil</p>
							<p class="card-text"><i class="fas fa-dumbbell"></i>Pequeno</p>
							<p class="card-text"><i class="fas fa-history"></i>Jovem</p>
							<p class="card-text"><i class="fas fa-map-marker-alt"></i>Porto Alegre/RS</p>
						</div>
					</div>
					<hr>
					<div class="pet-buttons">
						<button type="button" class="btn btn-primary">Ver</button>
						<button type="button" class="btn btn-success">Adotado</button>
						<button type="button" class="btn btn-danger">Remover</button>
					</div>
				</div>
    		</div>
    		<div class="col-12 col-lg-6">
    			<div class="card">
    				<div class="pet-item">
						<img class="card-img-top pet-pic" src="https://www.specialdog.com.br/assets/imgs/cao.png" alt="Card image cap">
						<div class="card-body text-left">
							<h5 class="card-title"><i class="fas fa-dog"></i>Nico</h5>
							<hr>
							<p class="card-text"><i class="fas fa-mars"></i>Macho</p>
							<p class="card-text"><i class="fas fa-paw"></i>Dócil</p>
							<p class="card-text"><i class="fas fa-dumbbell"></i>Pequeno</p>
							<p class="card-text"><i class="fas fa-history"></i>Jovem</p>
							<p class="card-text"><i class="fas fa-map-marker-alt"></i>Porto Alegre/RS</p>
						</div>
					</div>
					<hr>
					<div class="pet-buttons">
						<button type="button" class="btn btn-primary">Ver</button>
						<button type="button" class="btn btn-success">Adotado</button>
						<button type="button" class="btn btn-danger">Remover</button>
					</div>
				</div>
    		</div>
    	</div>
    </div>
</form>
</div>

<?= $this->endSection() ?>