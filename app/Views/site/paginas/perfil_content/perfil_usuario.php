<?= $this->extend('site/paginas/perfil_content/perfil_template') ?>
<?php $this->section('modalsenha'); ?>

<div class="modal fade" tabindex="-1" role="dialog" id="trocarsenha">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Alterar senha</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="perfil/alterarsenha">
				<div class="modal-body">
					<div class="form-row">
						<div class="form-group col-md-8">
							<label class="control-label" for="senha">Preencha os campos com a nova senha</label>
							<input type="password" class="form-control is-invalid" name="senha" required>
						</div>
						<div class="form-group col-md-8">
							<label for="senha">Digite a senha novamente</label>
							<input type="password" class="form-control" name="senha_r" required>
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

<?php $this->section('modalEditarPerfil'); ?>

<div class="modal fade" tabindex="-1" role="dialog" id="editarPerfil">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title font-weight-bold">Meus Dados</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="perfil/editarperfil">
				<div class="modal-body">
					<div class="form-row">
						<div class="form-group col-12">
							<label class="control-label" for="nome">Nome</label>
							<input type="text" class="form-control is-invalid" name="nome" id="nome" required>
						</div>
						<div class="form-group col-6">
							<label class="control-label" for="telefone">Telefone/WhatsApp</label>
							<input type="text" class="form-control is-invalid" name="telefone" id="telefone" required>
						</div>
						<div class="form-group col-6">
							<label class="control-label" for="cep">CEP</label>
							<input type="text" class="form-control is-invalid" name="cep" id="cep" required>
						</div>
						<div class="form-group col-6">
							<label class="control-label" for="cidade">Cidade</label>
							<input type="text" class="form-control is-invalid" name="cidade" id="cidade" required>
						</div>
						<div class="form-group col-6">
							<label class="control-label" for="estado">Estado</label>
							<input type="text" class="form-control is-invalid" name="estado" id="estado" required>
						</div>
						<div class="form-group col-12" style="margin-top: 15px;">
							<div class="form-check">
								<label class="form-check-label">
									<input class="form-check-input" type="checkbox" name="dadosPrivados" value="">
									Deixar meus dados de contato visíveis (Maiores chances de adoção)
									<span class="form-check-sign">
										<span class="check"></span>
									</span>
								</label>
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
	<h3 class="text-left font-weight-bold">Olá, <?= $usuario->nome ?>!</h3>
	<hr>
	<div class="row">
		<div class="col-12 col-lg-4 perfil-cabecalho-item">
			<div class="perfil-pic shadow">
				<img src="https://blog.humanesociety.org/wp-content/uploads/2017/12/india-dog-e1512757920691.jpg">
			</div>
		</div>
		<div class="col-12 col-md-6 col-lg-4 perfil-cabecalho-item">
			<div class="card" style="width: 20rem; margin: 0 auto;">
				<div class="card-body">
					<h4 class="card-title flex-justify-center"><i class="material-icons">check</i>Pets Divulgados</h4>
					<p class="card-text">
						<h3>0</h3>
					</p>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-6 col-lg-4 perfil-cabecalho-item">
			<div class="card" style="width: 20rem; margin: 0 auto;">
				<div class="card-body">
					<h4 class="card-title flex-justify-center"><i class="material-icons">pets</i>Pets Adotados</h4>
					<p class="card-text">
						<h3>0</h3>
					</p>
				</div>
			</div>
		</div>
	</div>
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
	<hr>

	<form method="POST" action="<?= base_url('perfil/alterar') ?>">

		<div class="form-row">

			<div class="form-group col-12 col-md-4">
				<label for="nome" class="font-weight-bold">Nome</label>
				<input type="text" readonly class="form-control readonly-input" id="nome" value="<?= $usuario->nome ?>">
			</div>

			<div class="form-group col-12 col-md-4">
				<label for="email" class="font-weight-bold">E-mail</label>
				<input type="hidden" id="id_usuario" value="<?= $usuario->id_usuario ?>">
				<input type="email" readonly class="form-control readonly-input  readonlyreadonly-input" id="email" placeholder="E-mail" value="<?= $usuario->email ?>" required>
			</div>

			<div class="form-group col-12 col-md-4">
				<label for="telefone" class="font-weight-bold">Telefone/WhatsApp</label>
				<input type="tel" class="form-control readonly-input" readonly id="telefone" value="<?= $usuario->telefone ?>">
			</div>

		</div>

		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="cep" class="font-weight-bold">CEP</label>
				<input type="text" class="form-control readonly-input" readonly id="cep">
			</div>
			<div class="form-group col-md-4">
				<label for="estado" class="font-weight-bold">Estado</label>
				<input type="text" class="form-control readonly-input" readonly id="estado">
			</div>
			<div class="form-group col-md-4">
				<label for="cidade" class="font-weight-bold">Cidade</label>
				<input type="text" class="form-control readonly-input" readonly id="cidade">
			</div>
		</div>
		<div class="form-check">
			<label class="form-check-label">
				<input class="form-check-input" type="checkbox" name="dadosPrivados" value="" onclick="return false;">
				Deixar meus dados de contato visíveis (Maiores chances de adoção)
				<span class="form-check-sign">
					<span class="check"></span>
				</span>
			</label>
		</div>

		<?php if (isset($erro)) : ?>

			<div class="alert alert-danger" role="alert">
				<?= $erro->listErrors() ?>
				<?php echo $erro->listErrors() ?>
			</div>
		<?php endif; ?>
		<br>
		<a href="#" data-toggle="modal" data-target="#editarPerfil"><button type="button" class="btn btn-primary">Editar</button></a>
		<a href="#" data-toggle="modal" data-target="#trocarsenha"><button type="button" class="btn btn-primary">Alterar Senha</button></a>

	</form>
</div>
<?php $this->endSection()?>