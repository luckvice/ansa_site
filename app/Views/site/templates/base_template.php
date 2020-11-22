<!--
=========================================================
  A.N.S.A PROJECT v 0.1
=========================================================
 -->
<!DOCTYPE html>
<html lang="pt-BR">
<?= $this->include('site/templates/header') ?>
<body class="<?php if (!isset($bodyPageProfile)) : echo 'landing-page'; elseif ($bodyPageProfile == true) : echo 'profile-page'; endif; ?> sidebar-collapse">

  <?php if (!session()->has('logado')) : ?>
    <!-- Autenticação Inicio -->
    <?= $this->include('site/common/login') ?>
    <?= $this->include('site/common/registrar') ?>
    <!-- Autenticação FIM-->
  <?php endif; ?>
  <?= $this->include('site/templates/navbar') ?>
  <?= $this->renderSection('content') ?>
  <?= $this->include('site/templates/footer') ?>
  <!-- Abre Modal Caso Tenha Falha na validação -->
  <?= $this->renderSection('openLoginModal') ?>
  <?= $this->renderSection('openRegistrarModal') ?>
  <?= $this->renderSection('openModalRecomendar') ?>
  <!-- Seleciona a Tab em caso de erro Perfil/cadastrarPet -->
</body>

</html>