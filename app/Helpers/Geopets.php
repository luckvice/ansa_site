<?php
namespace App\Helpers;
/*
    [A.N.S.A Project] Documentação da API https://ipinfo.io/developers
    Library para search IP Locate
*/
use App\Models\Estados;

class Geopets
{  
    function __construct() {
        $this->ip = $_SERVER['REMOTE_ADDR'];//http://ipinfo.io/187.113.226.25/json | region | city | hash 4feb9b44b1832a35c4e57e8e7e63bd73

    }

    public function getLocalizacaoUserByIp(){
       $estados = new Estados;
       $IP_API = 'http://api.ipstack.com/187.113.226.25?access_key=4feb9b44b1832a35c4e57e8e7e63bd73';
        session()->set('gps',false);
        $server_api     = json_decode(file_get_contents($IP_API));
        $response       = $server_api;
        $nome_estado    = $response->region_name;
        $nome_cidade    = $response->city;
        $dados_cidade   = $estados->getEstadosMununicipioByNome($nome_estado, $nome_cidade);
        session()->set('id_cidade', $dados_cidade->id_municipio);
        session()->set('id_estado', $dados_cidade->id_estado);
        session()->set('cidade',    $nome_cidade);
        session()->set('estado',    $nome_estado);
        $localizacao    = [
         'cidade'=> $nome_cidade,
         'estado'=> $nome_estado,
         'id_cidade' => $dados_cidade->id_municipio,
         'id_estado' => $dados_cidade->id_estado
        ];
       
      
       return $localizacao;
    }

    public function getLocalizacaoUser($positionLatidude, $positionLongitude){

        $estados = new Estados;
            session()->set('gps',true);
        $server = json_decode(
                    file_get_contents(
                        'https://maps.googleapis.com/maps/api/geocode/json?latlng=' .$positionLatidude. '%2C' .$positionLongitude.'&language=pt&result_type=locality&key=AIzaSyAHiOaxuvg0fgK3RZx7a8xJM7lF1VFmzsY'
                    ));
        $nome_cidade = $server->results[0]->address_components[1]->long_name;
        $nome_estado = $server->results[0]->address_components[2]->long_name;
        $dados_cidade = $estados->getEstadosMununicipioByNome($nome_estado, $nome_cidade);
        session()->set('id_cidade', $dados_cidade->id_municipio);
        session()->set('id_estado', $dados_cidade->id_estado);
        session()->set('cidade',    $nome_cidade);
        session()->set('estado',    $nome_estado );
        $localizacao = [
            'cidade'=> $nome_cidade,
            'estado'=> $nome_estado,
            'id_cidade' => $dados_cidade->id_municipio,
            'id_estado' => $dados_cidade->id_estado
        ];
    
        return $localizacao;
    }
}