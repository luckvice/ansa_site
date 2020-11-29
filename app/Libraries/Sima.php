<?php
namespace App\Libraries;
/*
    [A.N.S.A Project]
    SIMA Library

    Sistema Integrado de Mensagens Autonomas.
    
    Library para Envio de mensagens
*/
class Sima
{   
    private $ServerIP = '34.74.113.195:5000';

    public function enviarMensagemWa($telefone, $mensagem){
        $client   = \Config\Services::curlrequest();
        $telefone = preg_replace("/[^0-9]/", "", $telefone);
        $ServerIP = $this->ServerIP;
        $response = $client->request(
            'POST', "http://{$ServerIP}/chat/sendmessage/55{$telefone}",   
                ['form_params' => 
                    ['message' => $mensagem]
                ]
        );
        $response = json_decode($response->getBody());
        return $response->status.' | '.$response->message;
    }
    
    public function conversarComInteressado($numero ,$mensagem){   

     return redirect()->to('https://wa.me/+55'.$numero.'?text='.$mensagem);
    }

    public function enviarMensagemImagemWa($telefone, $mensagem, $base64Imagem){
        $client     = \Config\Services::curlrequest();
        $ServerIP   = $this->ServerIP;
        $response   = $client->request(
            'POST', "http://{$ServerIP}/chat/sendimage/55{$telefone}",   
                ['form_params' => 
                    [ 
                        'image'     => $base64Imagem,
                        'caption'   => $mensagem
                    ]
                ]
        );
        $response = json_decode($response->getBody());
        return $response->status.' | '.$response->message;
    }
    
    public function enviarMensagemEmail($assunto, $mensagem, $para){
        $email = \Config\Services::email();

        $config['protocol']     = 'smtp';
        $config['SMTPHost']     = 'smtp.gmail.com';
        $config['SMTPUser']     = 'amigonaoseabandona@gmail.com';
        $config['SMTPPass']     = 'Animalia553';
        $config['SMTPPort']     = 587;
        $config['SMTPCrypto']   = 'tls';
        $config['mailType']     = 'html';
        $config['charset']      = 'utf-8';
        $config['newline']      = "\r\n";

        $email->initialize($config)
                ->setFrom('amigonaoseabandona@gmail.com', 'Amigo Não Se Abandona')
                ->setTo($para) 
                ->setSubject($assunto)
                ->setMessage($mensagem)
                ->send(false);
    }
}