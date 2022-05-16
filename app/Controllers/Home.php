<?php

namespace App\Controllers;

use Myth\Auth\Authentication\LocalAuthentication;

class Home extends BaseController
{

    public function index()
    {
        $auth = service('authentication');

        if ($auth->check()) {
            $data["ruta"] = base_url() . "/perfil";
            $data["text"] = "El meu perfil";
            $data["ruta2"] = base_url() . "/logout";
            $data["text2"] = "Tancar sessió";
        } else {
            $data["ruta"] = base_url() . "/login";
            $data["text"] = "Iniciar sessió";
            $data["ruta2"] = base_url() . "/register";
            $data["text2"] = "Registrar-se";
        }

        return view('eatoday_web/index', $data);
    }
    public function establiments($codi_establiment = null)
    {
        $auth = service('authentication');

        if ($auth->check()) {
            $data["ruta"] = base_url() . "/perfil";
            $data["text"] = "El meu perfil";
            $data["ruta2"] = base_url() . "/logout";
            $data["text2"] = "Tancar sessió";
        } else {
            $data["ruta"] = base_url() . "/login";
            $data["text"] = "Iniciar sessió";
            $data["ruta2"] = base_url() . "/register";
            $data["text2"] = "Registrar-se";
        }
        if ($codi_establiment == null) {
            echo view('eatoday_web/establiments', $data);
        } else {
            $data["codi_establiment"] = $codi_establiment;

            echo view('eatoday_web/establiment', $data);
        }
    }
    public function categories($codi_establiment = null, $id_categoria = null)
    {
        $auth = service('authentication');

        $auth = service('authentication');

        if ($auth->check()) {
            $data["ruta"] = base_url() . "/perfil";
            $data["text"] = "El meu perfil";
            $data["ruta2"] = base_url() . "/logout";
            $data["text2"] = "Tancar sessió";
        } else {
            $data["ruta"] = base_url() . "/login";
            $data["text"] = "Iniciar sessió";
            $data["ruta2"] = base_url() . "/register";
            $data["text2"] = "Registrar-se";
        }
        $data["codi_establiment"] = $codi_establiment;
        $data["id_categoria"] = $id_categoria;

        echo view('eatoday_web/categoria', $data);
    }
    public function cartes($codi_establiment = null, $id_categoria = null, $id_carta = null)
    {
        $auth = service('authentication');

        if ($auth->check()) {
            $data["ruta"] = base_url() . "/perfil";
            $data["text"] = "El meu perfil";
            $data["ruta2"] = base_url() . "/logout";
            $data["text2"] = "Tancar sessió";
        } else {
            $data["ruta"] = base_url() . "/login";
            $data["text"] = "Iniciar sessió";
            $data["ruta2"] = base_url() . "/register";
            $data["text2"] = "Registrar-se";
        }
        $data["codi_establiment"] = $codi_establiment;
        $data["id_categoria"] = $id_categoria;
        $data["id_carta"] = $id_carta;

        echo view('eatoday_web/carta', $data);
    }
    public function plats($codi_establiment = null, $id_categoria = null, $id_carta = null, $id_plat = null)
    {
        $auth = service('authentication');

        if ($auth->check()) {
            $data["ruta"] = base_url() . "/perfil";
            $data["text"] = "El meu perfil";
            $data["ruta2"] = base_url() . "/logout";
            $data["text2"] = "Tancar sessió";
        } else {
            $data["ruta"] = base_url() . "/login";
            $data["text"] = "Iniciar sessió";
            $data["ruta2"] = base_url() . "/register";
            $data["text2"] = "Registrar-se";
        }
        $data["codi_establiment"] = $codi_establiment;
        $data["id_categoria"] = $id_categoria;
        $data["id_carta"] = $id_carta;
        $data["id_plat"] = $id_plat;

        echo view('eatoday_web/plat', $data);
    }
}
