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
<script src="https://demos.creative-tim.com/material-kit-pro/assets/js/plugins/jasny-bootstrap.min.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="<?= base_url('assets/js'); ?>/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Google Maps Plugin    -->
<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
<script src="<?= base_url('assets/js/'); ?>/material-kit.js?v=2.0.7" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.1/bootbox.min.js" integrity="sha512-eoo3vw71DUo5NRvDXP/26LFXjSFE1n5GQ+jZJhHz+oOTR4Bwt7QBCjsgGvuVMQUMMMqeEvKrQrNEI4xQMXp3uA==" crossorigin="anonymous"></script>
<script>
  $(function() {
    var hash = window.location.hash;
    hash && $('ul.nav a[href="' + hash + '"]').tab('show');
    var host = window.location.origin;
    $('#telefone').mask('(00) 00000-00009');
    $('#telefone_interessado').mask('(00) 00000-00009');
    var hash = window.location.hash;

    $('#estado').change(function(){
      const id_estado = $(this).val();

      $.ajax({
          url: host+'/api/getCidadesByEstadoId/'+id_estado,
          type: 'GET',

          error: function() {
            alert('Ocorreu um erro com a comunicação da API');
          },
          success: function(data) { 
            
            var options = '<option value="">Selecione a cidade</option>';
       
            for (var i = 0; i < data.length; i++) {
              options += '<option value="' +
              data[i].id_municipio + '">' +
              data[i].nome + '</option>';
            }
          
            $('#selectcidade').fadeIn();
            $('#cidade').html(options).show();
       
            $('#cidade').selectpicker();
            $('#cidade').selectpicker('refresh');
          }
        
         });
       
    });
    $('#cadastrar_pet').click(function() {
      alert('?');
    if (!$("input[name='especie']:checked").val()) {
       $('#erro_campos').fadeIn();
        return false;
    }
  
  });

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

      $(document).on("click", ".remover", function(e){
        var _this = this;//Chamada no acesso interno da callback
        bootbox.confirm({
                message: "Você tem certeza que deseja remover este Pet do site ?",
                buttons: {
                    confirm: {
                        label: '<i class="fa fa-check"></i>Confirmar',
                        className: 'btn btn btn-primary'
                    },
                    cancel: {
                        label: '<i class="fa fa-times"></i> Cancelar',
                        className: 'btn btn btn-secondary'
                    }
    },
    callback: function (result) {
       if(result == true){
        var id_pet  = $(_this).attr('id');
        const $el = $(`#${id_pet}`);
        //BLOCO AJAX

        $.ajax({
          url: host+'/api/removerPet/'+id_pet,
          type: 'GET',

          error: function() {
            alert('Ocorreu um erro com a comunicação da API');
          },
          success: function(data) { 
            $(_this).tooltip('hide');
            $el.closest('.col-12').html('Removendo...').remove().fadeOut();
            if ($('#lista').children().length == 0){
              $('#lista').append("<div class='col'>	<div class='alert alert-primary' role='alert'>	Nenhum pet cadastrado no momento.</div></div>");
            }
          }
         });

         //BLOCO UI
       }
    }
});


      });

      /* AÇÃO STATUS */
      $(document).on("click", ".adotar", function(e){
        var id_pet  = $(this).attr('id');
    $.ajax({
          url: host+'/api/alterarStatusPet/'+id_pet,
          type: 'GET',

          error: function() {
            alert('Ocorreu um erro com a comunicação da API');
          },
          success: function(data) { 
              const $el = $(`#${id_pet}`);
              if(data.status == 1){
                $el.attr('data-original-title', 'Listar novamente para adoção').tooltip('show')
                  .removeClass('btn-success')
                  .addClass('btn-warning')
                  .text("RESTAURAR")
                      .closest('.card')
                      .find('.badge')
                      .removeClass('badge-warning')
                      .addClass('badge-success')
                      .text('ADOTADO');
              }else if(data.status == 0){
                $el.attr('data-original-title', 'Marcar como adotado').tooltip('show')
                  .removeClass('btn-warning')
                  .addClass('btn-success')
                  .text("ADOTADO")
                      .closest('.card')
                      .find('.badge')
                      .removeClass('badge-success')
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