<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ClientController extends BaseController
{
    /**
     * Retorna la vista d'insertar codi i miro si hi ha la sessió iniciada
     */
    public function insertarCodi()
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
        return view("eatoday_web/insertarCodi", $data);
    }
}
