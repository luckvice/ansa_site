<?php
namespace App\Helpers;
/*
    [A.N.S.A Project]
    Crypton Helper

    Helper para criptografia


*/
class Crypton
{   



    public function cryptonThis($toEnc,$key){
       
        $cipher = "aes-128-gcm";
        if (in_array($cipher, openssl_get_cipher_methods()))
        {
            $ivlen = openssl_cipher_iv_length($cipher);
            $iv = openssl_random_pseudo_bytes($ivlen);
            $toEnc = openssl_encrypt($toEnc, $cipher, $key, $options=0, $iv, $tag);
            //store $cipher, $iv, and $tag for decryption later
           // $original_plaintext = openssl_decrypt($ciphertext, $cipher, $key, $options=0, $iv, $tag);
            
           return $toEnc;
        }
    }

    public function decryptonThis($toEnc,$key){
       
        $cipher = "aes-128-gcm";
        if (in_array($cipher, openssl_get_cipher_methods()))
        {
            $ivlen = openssl_cipher_iv_length($cipher);
            $iv = openssl_random_pseudo_bytes($ivlen);
            $toEnc = openssl_encrypt($toEnc, $cipher, $key, $options=0, $iv, $tag);
            //store $cipher, $iv, and $tag for decryption later
            $original_plaintext = openssl_decrypt($toEnc, $cipher, $key, $options=0, $iv, $tag);
            
           return $original_plaintext;
        }
    }

}