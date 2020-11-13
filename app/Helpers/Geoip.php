<?php
namespace App\Helpers;
/*
    [A.N.S.A Project]
    
    Library para search IP Locate
*/
class Geoip
{  
    function __construct() {
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->server_api = json_decode(file_get_contents('http://ipinfo.io/187.113.226.25/json'));
    }

    public function getRegiaoPorIp(){
        $response = $this->server_api;
        return $response->region;
    }

    public function getCidadePorIp(){
        $response = $this->server_api;
        return $response->city;
    }
}