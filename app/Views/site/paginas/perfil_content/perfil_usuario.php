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

<?php $this->section('content_perfil'); ?>
<div class="tab-pane active show" id="profile">
  <h3 class="text-left">Olá, <?= $usuario->nome ?>!</h3>
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
          <h4 class="card-title">Pets Divulgados</h4>
          <p class="card-text">
            <h3>0</h3>
          </p>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4 perfil-cabecalho-item">
      <div class="card" style="width: 20rem; margin: 0 auto;">
        <div class="card-body">
          <h4 class="card-title">Pets Adotados</h4>
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
  <?php endif; endif;?>
  <hr>
  <form method="POST" action="<?= base_url('perfil/alterar') ?>">

    <div class="form-row">

      <div class="form-group col-12 col-md-4">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" value="<?= $usuario->nome ?>">
      </div>

      <div class="form-group col-12 col-md-4">
        <label for="email">E-mail</label>
        <input type="hidden" name="id_usuario" id="id_usuario" value="<?= $usuario->id_usuario ?>">
        <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" value="<?= $usuario->email ?>" required>
      </div>
      
      <div class="form-group col-12 col-md-4">
        <label for="telefone">Telefone/WhatsApp</label>
        <input type="tel" class="form-control" name="telefone" id="telefone" value="<?= $usuario->telefone ?>">
      </div>
    
    </div>
    
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="cep">CEP</label>
        <input type="text" class="form-control" name="cep" id="cep">
      </div>
      <div class="form-group col-md-4">
        <label for="estado">Estado</label>
        <input type="text" class="form-control" name="estado" id="estado">
      </div>
      <div class="form-group col-md-4">
        <label for="cidade">Cidade</label>
        <input type="text" class="form-control" name="cidade" id="cidade">
      </div>
    </div>
    <div class="form-check">
      <label class="form-check-label">
          <input class="form-check-input" type="checkbox" name="dadosPrivados" value="">
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
    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="#" data-toggle="modal" data-target="#trocarsenha"><button type="button" class="btn btn-primary">Alterar Senha</button></a>
  
  </form>
</div>
<?php $this->endSection() ?>