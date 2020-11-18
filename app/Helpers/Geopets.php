<?php
namespace App\Helpers;
/*
    [A.N.S.A Project] Documentação da API https://ipinfo.io/developers
    Library para search IP Locate
*/
class Geopets
{  
    function __construct() {
        $this->ip = $_SERVER['REMOTE_ADDR'];//http://ipinfo.io/187.113.226.25/json | region | city | hash 4feb9b44b1832a35c4e57e8e7e63bd73
        $this->server_api = json_decode(file_get_contents('http://api.ipstack.com/187.113.226.25?access_key=4feb9b44b1832a35c4e57e8e7e63bd73'));
    }

    public function getRegiaoPorIp(){
        $response = $this->server_api;
        return $response->region_name;
    }

    public function getCidadePorIp(){
        $response = $this->server_api;
        return $response->city;
    }

    public function getLocalizacaoUser($positionLatidude, $positionLongitude){
        $server = json_decode(
                    file_get_contents(
                        'https://maps.googleapis.com/maps/api/geocode/json?latlng=' .$positionLatidude. '%2C' .$positionLongitude.'&language=pt&key=AIzaSyAHiOaxuvg0fgK3RZx7a8xJM7lF1VFmzsY'
                    ));
        $localizacao = [
            'cidade'=> $server->results[3]->address_components[3]->long_name,
            'estado'=> $server->results[3]->address_components[4]->long_name
        ];
        return $localizacao;
    }
}