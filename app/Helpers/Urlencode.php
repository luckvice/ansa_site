<?php
namespace App\Helpers;
/*
    [A.N.S.A Project]
    SIMA Library

    Sistema Integrado de Mensagens Autonomas.
    
    Library para Envio de mensagens
*/
class Urlencode
{  
    
    public static function urlsafeB64Encode($input)
    {
        return \str_replace('=', '', \strtr(\base64_encode($input), '+/', '-_'));
    }

    public static function urlsafeB64Decode($input)
    {
        $remainder = \strlen($input) % 4;
        if ($remainder) {
            $padlen = 4 - $remainder;
            $input .= \str_repeat('=', $padlen);
        }
        return \base64_decode(\strtr($input, '-_', '+/'));
    }
}