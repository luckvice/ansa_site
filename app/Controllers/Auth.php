<?php namespace App\Controllers;

class Auth extends BaseController
{
    public function login()//Realizar Login do usuario
	{
        return redirect()->route('perfil');
    }

    public function cadastrar()
	{
        echo 'cadastrar';
    }

}
