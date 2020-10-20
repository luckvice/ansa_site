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
    <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <?= $this->include('site/templates/footer') ?>
  <script src="https://demos.creative-tim.com/material-kit-pro/assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>

</body>

</html>