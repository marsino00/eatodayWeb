<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ComandesController extends BaseController
{
    private function mirarSessióIniciada()
    {
        $auth = service('authentication');

        if ($auth->check()) {
            // dd($auth->user());
            $rols = $auth->user()->getRoles();
            $rolsaux = [];
            foreach ($rols as $rol) {
                # code...
                array_push($rolsaux, $rol);
            }
            $data["rols"] = $rolsaux;
            $data["usuari"] = $auth->user();

            $data["ruta"] = base_url() . "/perfil";
            $data["text"] = "El meu perfil";
            $data["ruta2"] = base_url() . "/logout";
            $data["text2"] = "Tancar sessió";
        } else {
            $data["ruta"] = base_url() . "/login";
            $data["text"] = "Iniciar sessió";
            $data["ruta2"] = base_url() . "/register";
            $data["text2"] = "Registrar-se";
            $data["rols"] = "";
            $data["usuari"] = "";
        }

        return $data;
    }
    public function index()
    {
        $data = $this->mirarSessióIniciada();
        return view('personal/gestioDeComandes', $data);
    }
}
