<!--
=========================================================
  A.N.S.A PROJECT v 0.1
=========================================================
 -->
<!DOCTYPE html>
<html lang="pt-BR">

<?= $this->include('site/templates/header') ?>

<body class="landing-page sidebar-collapse">
  <!-- Autenticação Inicio -->
  <?= $this->include('site/common/login') ?>
  <?= $this->include('site/common/registrar') ?>
  <!-- Autenticação FIM-->
  <?= $this->include('site/templates/navbar') ?>
  <div class="main">
  <?= $this->renderSection('content') ?>
  </div>
  <?= $this->include('site/templates/footer') ?>
</body>

</html>