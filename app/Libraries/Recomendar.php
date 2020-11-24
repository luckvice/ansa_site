<?php
namespace App\Libraries;
use App\Models\Recomendacao;
use App\Models\Pets;
use App\Libraries\Sima;

class Recomendar
{
    public function recomendar() {

    $recomendacao   = new Recomendacao;
    $pets           = new Pets;
    $mensagem       = new Sima;
    $desejos        = $recomendacao->listarRecomendacoes();

    $consultas_realizadas = array();
    $recomendacoes_para_excluir = array();

    foreach ($desejos as $key => $desejo) {
        
        $caracteristicas_hash = md5($desejo->id_cidade . $desejo->id_porte . $desejo->id_sexo . $desejo->id_especie);

        if (!array_key_exists($caracteristicas_hash, $consultas_realizadas)) :
            $consulta = $pets->getPetsByRecomendacao($desejo);
            $consultas_realizadas[$caracteristicas_hash] = $consulta;
        else :
            $consulta = $consultas_realizadas[$caracteristicas_hash];
        endif;

        // Caso haja PETs correspondentes ao interesse do solicitante:
        if(count($consulta) > 0) {
            
            //Montamos o link de acesso para a consulta dos pets
            $data['link'] = base_url('/') . '/pets/todos/0/' . $desejo->id_porte . '/' . $desejo->id_sexo . '/0/' . $desejo->id_cidade;
            
            // Montamos o texto que será enviado para o WhatsApp do interessado
            $texto = "Oie! 😊💜
            
    🙋‍♂️ Venho aqui para te informar que um novo amiguinho que você procurava chegou no Amigo Não se Abandona! 🐶😸
            
    ◾ Estamos enviando essa recomendação de acordo com todas as características as quais você estava procurando! 😻
            
    ◾ Acesse o link e adote seu novo amigo! 💜 " . $data['link'];
            
            if($desejo->telefone)
                $mensagem->enviarMensagemWa($desejo->telefone, $texto);
            
            $data['img_header'] = base_url('assets/img/dog_perfil.jpg');
            
            if($desejo->email)
                $mensagem->enviarMensagemEmail('Sugestão de Adoção', view('site/templates/email/sugestao_adocao',$data), $desejo->email);

            // Como a recomendação foi enviada, adicionamos a lista de exclusão
            $recomendacoes_para_excluir[] = $desejo->id_disparo_recomendacao;
            
        }

    }

    // Excluímos as recomendações enviadas
    $recomendacao->limpar($recomendacoes_para_excluir);
    }
}