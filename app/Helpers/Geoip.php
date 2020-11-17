<?php
namespace App\Helpers;
/*
    [A.N.S.A Project] Documentação da API https://ipinfo.io/developers
    Library para search IP Locate
*/
class Geoip
{  
    function __construct() {
        $this->ip = $_SERVER['REMOTE_ADDR'];//http://ipinfo.io/187.113.226.25/json | region | city
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
}