<?= $this->extend('site/paginas/perfil_content/perfil_template') ?>

<?php $this->section('content_perfil'); ?>

<div class="modal fade" tabindex="-1" role="dialog" id="editarOng">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title font-weight-bold">Minha Ong</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="perfil/editarong">
				<div class="modal-body">
					<div class="form-row">
						<div class="form-group col-6">
							<label class="control-label" for="nome">Nome</label>
							<input type="text" class="form-control is-invalid" name="nome" id="nome" required>
						</div>
						<div class="form-group col-6">
							<label class="control-label" for="endereco">Endereço</label>
							<input type="text" class="form-control is-invalid" name="endereco" id="endereco" required>
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

<div class="tab-pane active show" id="profile">
	<h3 class="text-left font-weight-bold">Minha ONG</h3>
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
					<h4 class="card-title flex-justify-center"><i class="material-icons">pets</i>Cães Adotados</h4>
					<p class="card-text">
						<h3>0</h3>
					</p>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-6 col-lg-4 perfil-cabecalho-item">
			<div class="card" style="width: 20rem; margin: 0 auto;">
				<div class="card-body">
					<h4 class="card-title flex-justify-center"><i class="material-icons">pets</i>Gatos Adotados</h4>
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
				<input type="text" readonly class="form-control readonly-input" id="nome" value="ONG Protetora dos Animais">
			</div>

			<div class="form-group col-12 col-md-4">
				<label for="endereco" class="font-weight-bold">Endereço</label>
				<input type="text" readonly class="form-control readonly-input" id="endereco" value="ONG Protetora dos Animais">
			</div>

			<div class="form-group col-12 col-md-4">
				<label for="site" class="font-weight-bold">Site</label>
				<input type="hidden" id="id_usuario" value="<?= $usuario->id_usuario ?>">
				<input type="site" readonly class="form-control readonly-input" id="site" placeholder="Site" value="www.protetoradosanimais.com.br" required>
			</div>

		</div>

		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="facebook" class="font-weight-bold">Facebook</label>
				<input type="text" class="form-control readonly-input" readonly id="facebook">
			</div>
			<div class="form-group col-md-4">
				<label for="instagram" class="font-weight-bold">Instagram</label>
				<input type="text" class="form-control readonly-input" readonly id="instagram">
			</div>
			<div class="form-group col-md-4">
				<label for="twitter" class="font-weight-bold">Twitter</label>
				<input type="text" class="form-control readonly-input" readonly id="twitter">
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-12">
				<label for="descricao">Descrição da ONG (Informações para que os usuários conheçam sua ONG)</label>
				<textarea class="form-control readonly-input" name="descricao" id="descricao" rows="3" readonly></textarea>
			</div>
		</div>


		<?php if (isset($erro)) : ?>

			<div class="alert alert-danger" role="alert">
				<?= $erro->listErrors() ?>
				<?php echo $erro->listErrors() ?>
			</div>
		<?php endif; ?>
		<br>
		<a href="#" data-toggle="modal" data-target="#editarOng"><button type="button" class="btn btn-primary">Editar</button></a>

	</form>
</div>
<?php $this->endSection()?>