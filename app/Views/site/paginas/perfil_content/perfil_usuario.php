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
						<div class="form-group col-md-12">
							<label class="control-label" for="senha">Preencha os campos com a nova senha</label>
							<input type="password" class="form-control is-invalid" name="senha" required>
						</div>
						<div class="form-group col-md-12">
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
			<form method="POST" action="<?=base_url('perfil/alterar')?>">
				<div class="modal-body">
					<div class="form-row">
						<div class="form-group col-12">
							<label class="control-label" for="nome">Nome</label>
							<input type="text" class="form-control is-invalid" name="nome" id="nome" value="<?=$usuario->nome?>" required>
						</div>
						<div class="form-group col-6">
							<label class="control-label" for="telefone">Telefone/WhatsApp</label>
							<input type="text" class="form-control is-invalid" name="telefone" id="telefone" value="<?=$usuario->telefone?>" required>
						</div>
						<div class="form-group col-6">
							<label class="control-label" for="email">E-mail</label>
							<input type="email" class="form-control is-invalid" name="email" id="email" value="<?= $usuario->email?>" required>
						</div>
						<div class="form-group text-left" style="margin-top: 15px;">
							<select id="estado" class="selectpicker text-left" data-style="select-with-transition" title="Selecione o estado" data-size="7" name="estado" required>
							<option selected>Selecione o Estado</option>
										<?php foreach($estados as $row=>$value){?>
										<option value="<?= $value->id_estado?>"><?= $value->nome?></option>
										<?php }?>
							</select>
							<select id="cidade" class="selectpicker text-left" data-style="select-with-transition" title="Seleciona a cidade" data-size="7" name="cidade" required>
							</select> 
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
			<div class="perfil-pic">
				<img src="https://blog.humanesociety.org/wp-content/uploads/2017/12/india-dog-e1512757920691.jpg">
			</div>
		</div>
		<div class="col-12 col-md-6 col-lg-4 perfil-cabecalho-item">
			<div class="card" style="width: 20rem; margin: 0 auto;">
				<div class="card-body">
					<h4 class="card-title flex-justify-center"><i class="material-icons">check</i>Pets Divulgados</h4>
					<p class="card-text">
						<h3><?= $pets_divulgados ?></h3>
					</p>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-6 col-lg-4 perfil-cabecalho-item">
			<div class="card" style="width: 20rem; margin: 0 auto;">
				<div class="card-body">
					<h4 class="card-title flex-justify-center"><i class="material-icons">pets</i>Pets Adotados</h4>
					<p class="card-text">
						<h3><?= $pets_adotados ?></h3>
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
				<label for="cidade" class="font-weight-bold">Sou de</label>
				<input type="text" class="form-control readonly-input" readonly id="cidade" value="<?= $cidade->nome?>/<?=$cidade->uf?>">
			</div>
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