<?php

namespace App\Libraries;
use App\Models\Pets; //Carrega Model SQL

class Galeria
{

    public function retornaCapa($id_pet)
    {
        $Pets   = new Pets();
        $imagem =  $pets->getCapaGaleria($id_pet);
        return $imagem;
    }
} 