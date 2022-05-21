<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PerfilController extends BaseController
{

    /**
     * Retorna la vista del perfil d'un usuari i miro si hi ha la sessió iniciada
     */
    public function index()
    {
        $auth = service('authentication');

        if ($auth->check()) {
            $data["ruta"] = base_url() . "/perfil";
            $data["text"] = "El meu perfil";
            $data["usuari"] = $auth->user();
            $data["ruta2"] = base_url() . "/logout";
            $data["text2"] = "Tancar sessió";
        } else {
            $data["ruta"] = base_url() . "/login";
            $data["text"] = "Iniciar sessió";
            $data["ruta2"] = base_url() . "/register";
            $data["text2"] = "Registrar-se";
        }
        if (!$auth->check()) {
            // $this->session->set('redirect_url', current_url());
            return redirect()->route('login');
        } else {
            return view("eatoday_web/perfil", $data);
        }
    }
}
