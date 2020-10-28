<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Ongs extends Controller
{
    public function index()
    {
    }

    public function ong($id = "")
    {
        echo $id;
    }
}
