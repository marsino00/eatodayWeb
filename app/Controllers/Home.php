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
    public function categories($codi_establiment = null, $id_categoria = null)
    {
        $data["codi_establiment"] = $codi_establiment;
        $data["id_categoria"] = $id_categoria;

        echo view('plantilla_eatoday_web/categoria', $data);
    }
    public function cartes($codi_establiment = null, $id_categoria = null, $id_carta = null)
    {
        $data["codi_establiment"] = $codi_establiment;
        $data["id_categoria"] = $id_categoria;
        $data["id_carta"] = $id_carta;

        echo view('plantilla_eatoday_web/carta', $data);
    }
    public function plats($codi_establiment = null, $id_categoria = null, $id_carta = null, $id_plat = null)
    {
        $data["codi_establiment"] = $codi_establiment;
        $data["id_categoria"] = $id_categoria;
        $data["id_carta"] = $id_carta;
        $data["id_plat"] = $id_plat;

        echo view('plantilla_eatoday_web/plat', $data);
    }
}
