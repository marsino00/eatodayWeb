<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('plantilla_eatoday_web/index');
    }
    public function establiments($codi_establiment = null)
    {
        $data["codi_establiment"] = $codi_establiment;
        if ($codi_establiment == null) {
            echo view('plantilla_eatoday_web/establiments');
        } else {



            echo view('plantilla_eatoday_web/establiment', $data);
        }
    }
}
