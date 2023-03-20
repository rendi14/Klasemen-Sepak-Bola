<?php

namespace App\Controllers;

use App\Models\Modelklub;

class Klasemen extends BaseController
{
    public function index()
    {
        $modelklubsepakbola = new Modelklub();
        $data = [
            'title' => "Klasemen Sepak Bola",
            'klasemen' =>  $modelklubsepakbola->Klasemen()
        ];
        return view('Main/klasemen', $data);
    }
}
