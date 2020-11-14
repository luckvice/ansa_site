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
			<form method="POST" action="perfil/editarOng">
				<div class="modal-body">
					<div class="form-row">
						<div class="form-group col-12">
							<label class="control-label" for="nome">Nome</label>
							<input type="text" class="form-control is-invalid" name="nome" id="nome" required>
						</div>
						<div class="form-group col-6">
							<label class="control-label" for="site">Site</label>
							<input type="text" class="form-control is-invalid" name="site" id="site" required>
						</div>
						<div class="form-group col-6">
							<label class="control-label" for="facebook">Facebook</label>
							<input type="text" class="form-control is-invalid" name="facebook" id="facebook" required>
						</div>
						<div class="form-group col-6">
							<label class="control-label" for="instagram">Instagram</label>
							<input type="text" class="form-control is-invalid" name="instagram" id="instagram" required>
						</div>
						<div class="form-group col-6">
							<label class="control-label" for="twitter">Twitter</label>
							<input type="text" class="form-control is-invalid" name="twitter" id="twitter" required>
						</div>
						<div class="form-group col-12" style="margin-top: 20px;">
							<label class="control-label" for="descricao">Descrição da ONG (Descreva informações que ajudem o usuário a conhecer melhor a sua ONG!)</label>
                    		<textarea class="form-control" name="descricao" id="descricao" rows="3" required></textarea>
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
	
	<div class="row">
		<div class="col">
			<div class="alert alert-success" role="alert">
				Erro Teste
			</div>
		</div>

	</div>
	<div class="row">
		<div class="col">
			<div class="alert alert-danger" role="alert">
				Erro Teste
			</div>
		</div>

	</div>

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
				</div>

			</div>
		</div>
	</form>
</div>

<?php $this->endSection()?>