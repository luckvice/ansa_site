<footer class="footer footer-default">
  <div class="container">
    <nav class="float-left">
      <ul>
        <li>
          <a href="#">
            A.N.S.A Project
          </a>
        </li>
        <li>
          <a href="#">
            Sobre nós
          </a>
        </li>
        <li>
          <a href="#">
            Noticias
          </a>
        </li>
        <li>
          <a href="#">
            Fale conosco
          </a>
        </li>
      </ul>
    </nav>
    <div class="copyright float-right">
      &copy;
      <script>
        document.write(new Date().getFullYear())
      </script> By
      <a href="#" target="_blank">Lucas M. & Felipe</a>
    </div>
  </div>
</footer>
<!--   Core JS Files   -->
<script src="<?= base_url('assets/js/core'); ?>/jquery.min.js" type="text/javascript"></script>
<script src="<?= base_url('assets/js/core'); ?>/popper.min.js" type="text/javascript"></script>
<script src="<?= base_url('assets/js/core'); ?>/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="<?= base_url('assets/js'); ?>/plugins/moment.min.js"></script>
<script src="<?= base_url('assets/js'); ?>/recaptcha.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/js/bootstrap-select.min.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="<?= base_url('assets/js'); ?>/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Google Maps Plugin    -->
<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
<script src="<?= base_url('assets/js/'); ?>/material-kit.js?v=2.0.7" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<script>
  $(function() {
    var hash = window.location.hash;
    hash && $('ul.nav a[href="' + hash + '"]').tab('show');
    var host = window.location.origin;
    $('#telefone').mask('(00) 00000-00009');
    var hash = window.location.hash;

   if(hash == '#minhaong'){

    $("#ajax").html('CARREGANDO...')
      setInterval(function(){
      $("#ajax").load(host+"/debug/listaPetsAjax");
      }, 2000) 
   }
    $("#minhaong").click(function(){
        $("#ajax").load(host+"/debug/listaPetsAjax");
    });

    $("#minhaong_teste").click(function(){
        $("#ajax").load(host+"/debug/cadastrarPetAjax");
    });

   // $(".btn-success").click(function(){
      $(document).on("click", ".adotar", function(e){
      
    var id_pet = $(this).attr('id');
    var valor = $('#'+id_pet).closest('.card').attr('class');
    console.log(valor);
    
    $.ajax({
          url: host+'/api/alterarStatusPet/'+id_pet,
          type: 'GET',

          error: function() {
            alert('Ocorreu um erro com a comunicação da API');
          },
          success: function(data) {
              
              const $el = $(`#${id_pet}`);
              if(data.status == 1){

              $el.data('original-title','Listar novamente para adoção')
                  .removeClass(['btn-success', 'badge-warning'])
                  .addClass('btn-warning')
                  .text("RESTAURAR")
                      .closest('.card')
                      .find('.badge')
                      .addClass('badge-success')
                      .text('ADOTADO');
              }else if(data.status == 0){
                $('#'+id_pet).removeClass('btn-warning').addClass('btn-success').text("ADOTADO");
                $('#'+id_pet).data('original-title','Marcar como Adotado');
                $('#'+id_pet).parent()
                        .parent().find('.badge')
                        .removeClass('badge-warning')
                        .addClass('badge-warning')
                        .text('Em espera');
              }
          }
      });
    });

    $(".solicitar_adocao").click(function(){
      $(".solicitar_adocao").text('enviando...');
      $(".solicitar_adocao").prop('disabled', true);
      var telefone  = $("input[id='telefone_interessado']").val();
      var msg_opcional = $("textarea[name='msg_opcional']").val();
      var id_pet    = $("input[name='id_pet']").val();
      var nome_pet  = $("input[name='nome_pet']").val();
      var nome_interessado  = $("input[name='nome_interessado']").val();
      var nome_protetor  = $("input[name='nome_protetor']").val();
      
      
      $.ajax({
          url: host+'/api/solicitarAdocao',
          type: 'POST',
          data: {
                  telefone        : telefone, 
                  msg_opcional    : msg_opcional,
                  id_pet          : id_pet,
                  nome_pet        : nome_pet,
                  nome_interessado: nome_interessado,
                  nome_protetor   : nome_protetor
                },
          error: function() {
            $(".alert-danger").fadeIn();
            $(".solicitar_adocao").prop('disabled', false);
            $(".response_erro").text('Ocorreu um erro em sua Solicitação com a API');
            $(".solicitar_adocao").text('Tentar novamente!');
          },
          success: function(data) {
            if(data.status == 1){
              $(".alert-success").fadeIn();
              $(".response_sucesso").text(data.mensagem);
              $(".solicitar_adocao").text('Enviado!');
            }else if(data.status == 2){
              $(".alert-danger").fadeIn();
              $(".response_erro").text(data.mensagem);
              $(".solicitar_adocao").prop('disabled', false);
            }
          }
      });
    });
  });
</script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker 
      <script src="../assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
   <script type="text/javascript"> Exemplo datePicker
  
  $(document).ready(function () {
    $('.datetimepicker').datetimepicker({
      icons: {
          time: "fa fa-clock-o",
          date: "fa fa-calendar",
          up: "fa fa-chevron-up",
          down: "fa fa-chevron-down",
          previous: 'fa fa-chevron-left',
          next: 'fa fa-chevron-right',
          today: 'fa fa-screenshot',
          clear: 'fa fa-trash',
          close: 'fa fa-remove'
      }
  });
  });
  </script> 

  -->