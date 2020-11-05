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
            <label for="senha">Preencha os campos com a nova senha</label>
              <input type="password" class="form-control" name="senha" required>
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

<?php $this->section('content_perfil'); ?>
<div class="tab-pane active show" id="profile">
  <h3 class="text-left">Ola! <?= $usuario->nome ?> | suas informações</h3>
  <div class="row">
    <div class="col md-6">
      <div class="card" style="width: 20rem;">
        <div class="card-body">
          <h4 class="card-title">Pets Divulgados</h4>
          <p class="card-text">
            <h3>0</h3>
          </p>
        </div>
      </div>
    </div>
    <div class="col md-6">
      <div class="card" style="width: 20rem;">
        <div class="card-body">
          <h4 class="card-title">Pets Adotados</h4>
          <p class="card-text">
            <h3>0</h3>
          </p>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <form method="POST" action="<?= base_url('perfil/alterar') ?>">

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="email">E-mail</label>
        <input type="hidden" name="id_usuario" id="id_usuario" value="<?= $usuario->id_usuario ?>">
        <input type="email" readonly class="form-control" name="email" id="email" placeholder="E-mail" value="<?= $usuario->email ?>" required>
      </div>
      <div class="form-group col-md-6">
        <label for="senha">Senha</label>
        <p>Para alterar a senha</p>
        <a href="#" data-toggle="modal" data-target="#trocarsenha">Clique aqui</a>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-2">
        <label for="cep">CEP</label>
        <input type="text" class="form-control" name="cep" id="cep">
      </div>
      <div class="form-group col-md-2">
        <label for="estado">Estado</label>
        <input type="text" class="form-control" name="estado" id="estado">
      </div>
      <div class="form-group col-md-4">
        <label for="cidade">Cidade</label>
        <input type="text" class="form-control" name="cidade" id="cidade">
      </div>
      <div class="form-group col-md-4">
        <label for="telefone">Telefone/whats</label>
        <input type="tel" class="form-control" name="telefone" id="telefone" value="<?= $usuario->telefone ?>">
      </div>
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="dadosPrivados" value="">
        Deixar visível meus dados <br> (Maiores chances de adoção)
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
    <button type="submit" class="btn btn-primary">Salvar</button>
  </form>
</div>
<?php $this->endSection() ?>