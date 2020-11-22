/*CORE PROJECT*/
$(function () {



  navigator.geolocation.getCurrentPosition(showPosition, error);

  function showPosition(position) {
    console.log(position.coords.latitude);
    console.log(position.coords.longitude);
    $.ajax({
      url: host + '/api/getPosition',
      type: 'POST',
      data: {
        latitude: position.coords.latitude,
        longitude: position.coords.longitude
      },
      error: function () {

      },
      success: function (data) {
        if (data.codigo == 1) {
          location.reload();
        }
      }
    });
  }
  function error(err) {
    console.log('Infelizmente não poderemos encontrar os pets pela sua localização :( ');
  }

  var hash = window.location.hash;
  hash && $('ul.nav a[href="' + hash + '"]').tab('show');
  var host = window.location.origin;
  $('#telefone').mask('(00) 00000-0009');
  $('#telefone_interessado').mask('(00) 00000-0009');
  var hash = window.location.hash;

  $('#termos').click(function () {
    $(this).val('1');
  });

  $('#solicitarSenha').click(function () {
    const email = $('#esqueci_email').val();
    $("#solicitarSenha").prop('disabled', true);
    $("#solicitarSenha").text('Solicitando...');

    $.ajax({
      url: host + '/api/solicitarSenha',
      type: 'POST',
      data: {
        esqueci_email: email
      },
      error: function () {
        $("#resposta").addClass('alert alert-danger');
        $("#resposta").html('Ocorreu um erro com a API');
        $("#resposta").fadeIn();
      },
      success: function (data) {
        if (data.status == 1) {
          $("#resposta").removeClass('alert alert-danger');
          $("#resposta").addClass('alert alert-success');
          $("#resposta").html(data.mensagem);
          $("#resposta").fadeIn();
          $("#solicitarSenha").prop('disabled', false);
          $("#solicitarSenha").text('Enviar solicitação');
        } else if (data.status == 2) {
          $("#resposta").addClass('alert alert-danger');
          $("#resposta").html(data.mensagem);
          $("#resposta").fadeIn();
          $("#solicitarSenha").prop('disabled', false);
          $("#solicitarSenha").text('Enviar solicitação');
        }
      }
    });
  });

  $('#estado').change(function () {
    const id_estado = $(this).val();
    $.ajax({
      url: host + '/api/getCidadesByEstadoId/' + id_estado,
      type: 'GET',

      error: function () {
        alert('Ocorreu um erro com a comunicação da API');
      },
      success: function (data) {
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

  $('#filtro_estado').change(function () {
    const id_estado = $(this).val();
    $.ajax({
      url: host + '/api/getCidadesByEstadoId/' + id_estado,
      type: 'GET',

      error: function () {
        alert('Ocorreu um erro com a comunicação da API');
      },
      success: function (data) {
        var options = '<option value="">Selecione a cidade</option>';
        for (var i = 0; i < data.length; i++) {
          options += '<option value="' +
            data[i].id_municipio + '">' +
            data[i].nome + '</option>';
        }
        $('#filtro_selectcidade').fadeIn();
        $('#filtro_cidade').html(options).show();
        $('#filtro_cidade').selectpicker();
        $('#filtro_cidade').selectpicker('refresh');
      }
    });
  });

  $('#cadastrar_pet').click(function () {
    $('#erro_campos').fadeOut();
    if (!$("input[name='especie']:checked").val()) {
      $("#erro_campos").html('Marque o campo Espécie');
      $('#erro_campos').fadeIn();
      return false;
    }
    if (!$("input[name='porte']:checked").val()) {
      $('#erro_campos').fadeIn();
      $("#erro_campos").html('Marque o campo Porte');
      return false;
    }
    if (!$("input[name='sexo']:checked").val()) {
      $("#erro_campos").html('Marque o campo Sexo');
      $('#erro_campos').fadeIn();
      return false;
    }
    if ($('#estado').val() == 0) {
      $("#erro_campos").html('Marque o campo cidade');
      $('#erro_campos').fadeIn();
      return false;
    }
    if ($('#cidade').val() == 0) {
      $("#erro_campos").html('Marque o campo cidade');
      $('#erro_campos').fadeIn();
      return false;
    }
  });

  if (hash == '#minhaong') {

    $("#ajax").html('CARREGANDO...')
    setInterval(function () {
      $("#ajax").load(host + "/debug/listaPetsAjax");
    }, 2000)
  }
  $("#minhaong").click(function () {
    $("#ajax").load(host + "/debug/listaPetsAjax");
  });

  $("#minhaong_teste").click(function () {
    $("#ajax").load(host + "/debug/cadastrarPetAjax");
  });

  $(document).on("click", ".remover", function (e) {
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
        if (result == true) {
          var id_pet = $(_this).attr('id');
          const $el = $(`#${id_pet}`);
          //BLOCO AJAX

          $.ajax({
            url: host + '/api/removerPet/' + id_pet,
            type: 'GET',

            error: function () {
              alert('Ocorreu um erro com a comunicação da API');
            },
            success: function (data) {
              $(_this).tooltip('hide');
              $el.closest('.col-12').html('Removendo...').remove().fadeOut();
              if ($('#lista').children().length == 0) {
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
  $(document).on("click", ".adotar", function (e) {
    var id_pet = $(this).attr('id');
    $.ajax({
      url: host + '/api/alterarStatusPet/' + id_pet,
      type: 'GET',

      error: function () {
        alert('Ocorreu um erro com a comunicação da API');
      },
      success: function (data) {
        const $el = $(`#${id_pet}`);
        if (data.status == 1) {
          $el.attr('data-original-title', 'Listar novamente para adoção').tooltip('show')
            .removeClass('btn-success')
            .addClass('btn-warning')
            .text("RESTAURAR")
            .closest('.card')
            .find('.badge')
            .removeClass('badge-warning')
            .addClass('badge-success')
            .text('ADOTADO');
        } else if (data.status == 0) {
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

  $(".solicitar_adocao").click(function () {
    $(".solicitar_adocao").text('enviando...');
    $(".solicitar_adocao").prop('disabled', true);
    var telefone = $("input[id='telefone_interessado']").val();
    var msg_opcional = $("textarea[name='msg_opcional']").val();
    var id_pet = $("input[name='id_pet']").val();
    var nome_pet = $("input[name='nome_pet']").val();
    var nome_interessado = $("input[name='nome_interessado']").val();
    var nome_protetor = $("input[name='nome_protetor']").val();
    var email_interessado = $("input[name='email_interessado']").val();
    var pet_genero = $("input[name='pet_genero']").val();
    console.log(telefone);
    if (email_interessado == '' || isValidEmailAddress(email_interessado)) {
      $.ajax({
        url: host + '/api/solicitarAdocao',
        type: 'POST',
        data: {
          telefone: telefone,
          msg_opcional: msg_opcional,
          id_pet: id_pet,
          nome_pet: nome_pet,
          nome_interessado: nome_interessado,
          nome_protetor: nome_protetor,
          email_interessado: email_interessado,
          pet_genero: pet_genero
        },
        error: function () {
          $(".alert-danger").fadeIn();
          $(".solicitar_adocao").prop('disabled', false);
          $(".response_erro").text('Ocorreu um erro em sua Solicitação com a API');
          $(".solicitar_adocao").text('Tentar novamente!');
        },
        success: function (data) {
          if (data.status == 1) {
            $(".alert-success").fadeIn();
            $(".response_sucesso").text(data.mensagem);
            $(".solicitar_adocao").text('Enviado!');
          } else if (data.status == 2) {
            $(".alert-danger").fadeIn();
            $(".response_erro").text(data.mensagem);
            $(".solicitar_adocao").prop('disabled', false);
            $(".solicitar_adocao").text('Tentar novamente!');
          }
        }
      });
    } else {
      $(".response_erro").text('Informe um E-mail válido');

    }


  });
});

function isValidEmailAddress(emailAddress) {
  var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
  return pattern.test(emailAddress);
};
