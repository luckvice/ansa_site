<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<div class="tab-pane active show" id="listarPetsCadastrados">
<form>
    <div class="container">
    	<div class="row">

		<?php if(empty($listaPets)):
		?>
			<div class="col">
				<div class="alert alert-primary" role="alert">
					Nenhum pet cadastrado no momento.
				</div>
			</div>
			<?php endif; ?>
		<?php foreach($listaPets as $key=>$value){?>

    		<div class="col-12 col-lg-6">
    			<div class="card">
    				<div class="pet-item">
    					<div class="pet-pic">
							<img class="card-img-top" src="data:image/jpeg;base64,<?= $value->imagem;?>" alt="Card image cap">
    					</div>
						<div class="card-body text-left">
							<div class="pet-title">
								<h5 class="card-title"><i class="fas <?php if($value->id_especie == 1): echo 'fa-dog'; else: echo 'fa-cat'; endif; ?>"></i> <?= $value->nome;?></h5>
								<span class="badge <?php if($value->adotado == 0): echo 'badge-warning'; $status = 'Em espera'; else:  echo 'badge-success'; $status = 'Adotado'; endif;?>"><?= $status?></span>
							</div>
							
							<hr class="pet-title-divisor">
							
							<p class="card-text"><i class="fas <?php if($value->id_sexo == 1): echo 'fa-mars'; else: echo 'fa-venus'; endif; ?>"></i>Fêmea</p>
							<p class="card-text"><i class="fas fa-dumbbell"></i>		<?= $value->porte_descricao ?></p>
							<p class="card-text"><i class="fas fa-history"></i>			<?= $value->faixa_etaria_descricao ?></p>
							<p class="card-text"><i class="fas fa-map-marker-alt"></i>	<?= $value->municipio_nome ?>/<?= $value->uf ?></p>
						</div>
					</div>
					<hr>
					<div class="pet-buttons">
					<?php 
							if($value->adotado == 1){
								$status 	= 'desmarcaradotado';
								$tootip 	= 'Listar novamente para adoção'; 
								$btnstatus 	= 'Restaurar';
								$mark 		= 'btn-warning';
								
							}else{
								$status 	= 'marcaradotado';
								$tootip 	= 'Marcar como adotado'; 
								$btnstatus 	= 'Adotado';
								$mark 		= 'btn-success';
							}
					?>	
						<a href="<?= base_url('pet')."/".$value->id_pet?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Visualizar informações do pet">Ver</a>
						<a href="<?= base_url('/perfil')."/{$status}"."/".$value->id_pet?>" class="btn <?= $mark ?>" data-toggle="tooltip" data-placement="top" title="<?= $tootip ?>"><?=$btnstatus?></a>
						<a href="<?= base_url('/perfil/removerpet')."/".$value->id_pet?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="remover pet do site">Remover</a>
					</div>
				</div>
    		</div>
		<?php }?>
    	</div>
    </div>
</form>
</div>