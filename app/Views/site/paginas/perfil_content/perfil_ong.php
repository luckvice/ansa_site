<?= $this->extend('site/paginas/perfil_content/perfil_template') ?>

<?php $this->section('modalEditarOng'); ?>

<div class="modal fade" tabindex="-1" role="dialog" id="editarOng">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title font-weight-bold">Minha Ong</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="<?=base_url('perfil/editarOng');?>" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-row">
						<div class="form-group col-12">
							<label class="control-label" for="nome">Nome</label>
							<input type="text" class="form-control is-invalid" name="nome" id="nome" value="<?=$ong->nome?>" required>
						</div>
						<div class="form-group col-6">
							<label class="control-label" for="site">Site</label>
							<input type="url" placeholder="Ex: https://meusite.com" class="form-control is-invalid" name="site" id="site" value="<?=$ong->site?>">
						</div>
						<div class="form-group col-6">
							<label class="control-label" for="facebook">Facebook</label>
							<input type="url" placeholder="Ex: https://facebook.com/meuface" class="form-control is-invalid" name="facebook" id="facebook" value="<?=$ong->facebook?>">
						</div>
						<div class="form-group col-6">
							<label class="control-label" for="instagram">Instagram</label>
							<input type="url" placeholder="https://instagram.com/meuinsta" class="form-control is-invalid" name="instagram" id="instagram" value="<?=$ong->instagram?>">
						</div>
						<div class="form-group col-6">
							<label class="control-label" for="twitter">Twitter</label>
							<input type="url" placeholder="https://twitter.com/meutwitter" class="form-control is-invalid" name="twitter" id="twitter" value="<?=$ong->twitter?>">
						</div>
						<div class="form-group col-12" style="margin-top: 10px;">
							<label class="control-label" for="descricao">Descrição da ONG (Descreva informações que ajudem o usuário a conhecer melhor a sua ONG!)</label>
                    		<textarea class="form-control" style="margin-top: 15px;" name="descricao" id="descricao" rows="3" required><?=$ong->descricao?></textarea>
						</div>
						<div class="col-12" style="margin-top: 10px;">
							<div>
								<label class="control-label" for="avatar">Foto de Perfil:</label>
							</div>
							<div class="fileinput fileinput-<?=$ong->avatar ? 'exists' : 'new'?> text-center flex-justify-center" data-provides="fileinput" style="flex-direction: column;">
								<div class="fileinput-new thumbnail img-circle img-raised" style="max-width: 220px !important;">
									<img src="https://epicattorneymarketing.com/wp-content/uploads/2016/07/Headshot-Placeholder-1.png" alt="Foto de Perfil">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail img-raised" style="max-width: 220px !important;">
									<?php if($ong->avatar):?>
										<img src="data:image/png;base64,<?=$ong->avatar?>">
									<?php endif;?>
								</div>
								<div>
									<span class="btn btn-raised btn-round btn-default btn-file">
										<span class="fileinput-new">Selecionar Imagem</span>
										<span class="fileinput-exists">Alterar</span>
										<input name="avatar" type="file" />
									</span>
									<a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput">
									<i class="fa fa-times"></i> Remover</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Salvar</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php $this->endSection(); ?>

<?php $this->section('content_perfil'); ?>

<div class="tab-pane active show" id="profile">
	<h3 class="text-left font-weight-bold">Minha ONG</h3>
	<hr>
	
	<?php $mensagem = session()->get('mensagem');

		if(isset($mensagem)): 
			if($mensagem['codigo'] == 1): 

				?>
				<div class="row">
					<div class="col">
						<div class="alert alert-success" role="alert">
							<?= $mensagem['mensagem'] ?>
						</div>
					</div>

				</div>
				<?php elseif($mensagem['codigo'] == 2): ?>
					<div class="row">
						<div class="col">
							<div class="alert alert-danger" role="alert">
								<?= $mensagem['mensagem'] ?>
							</div>
						</div>

					</div>
	<?php	endif;
		endif;
	?>

	<form method="POST" action="<?= base_url('perfil/alterar') ?>">

		<div class="container">

			<div class="row">
				
				<div class="col-12 col-md-3" style="display: flex; align-items: center; padding: 20px;">

					<div class="perfil-pic">
						<img src="<?=$avatar_src?>">
					</div>

				</div>

				<div class="col-12 col-md-9">
					<div class="form-row">

						<div class="form-group col-12 col-md-6">
							<label for="nome" class="font-weight-bold">Nome</label>
							<input type="text" readonly class="form-control readonly-input" id="nome" value="<?=$ong->nome?>">
						</div>

						<div class="form-group col-12 col-md-6">
							<label for="site" class="font-weight-bold">Site</label>
							<input type="site" readonly class="form-control readonly-input" id="site" placeholder="Site" value="<?=$ong->site?>" required>
						</div>

					</div>

					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="facebook" class="font-weight-bold">Facebook</label>
							<input type="text" class="form-control readonly-input" readonly id="facebook" value="<?=$ong->facebook?>">
						</div>
						<div class="form-group col-md-4">
							<label for="instagram" class="font-weight-bold">Instagram</label>
							<input type="text" class="form-control readonly-input" readonly id="instagram" value="<?=$ong->instagram?>">
						</div>
						<div class="form-group col-md-4">
							<label for="twitter" class="font-weight-bold">Twitter</label>
							<input type="text" class="form-control readonly-input" readonly id="twitter" value="<?=$ong->twitter?>">
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="descricao">Descrição da ONG (Informações para que os usuários conheçam sua ONG)</label>
							<textarea class="form-control readonly-input" name="descricao" id="descricao" rows="3" readonly><?=$ong->descricao?></textarea>
						</div>
					</div>
				</div>
			</div>

			<div class="row">

	 			<div class="col-12">
					<?php if (isset($erro)) : ?>

						<div class="alert alert-danger" role="alert">
							<?= $erro->listErrors() ?>
							<?php echo $erro->listErrors() ?>
						</div>
					<?php endif; ?>
					<br>
					<a href="#" data-toggle="modal" data-target="#editarOng"><button type="button" class="btn btn-primary">Editar</button></a>
					<a href="<?= base_url('ong')."/".$ong->id_ong?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Visualizar informações da ONG">Ver</a>
				</div>

			</div>
		</div>
	</form>
</div>

<?php $this->endSection()?>