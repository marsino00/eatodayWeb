<?php

namespace App\Controllers;

use Myth\Auth\Authentication\LocalAuthentication;

class Home extends BaseController
{
    /**
     * Funció que vaig cridant a les diferents pàgines del web per a controlar si s'ha iniciat sessió i obtenir els 
     * diferents rols del usuari
     */
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

    /**
     * Pàgina principal del aplicatiu web.
     */
    public function index()
    {
        $data = $this->mirarSessióIniciada();


        return view('eatoday_web/index', $data);
    }

    /**
     * Retorna la vista amb el llistat d'establiments
     */

    public function establiments($codi_establiment = null)
    {
        $data = $this->mirarSessióIniciada();

        if ($codi_establiment == null) {
            echo view('eatoday_web/establiments', $data);
        } else {
            $data["codi_establiment"] = $codi_establiment;

            echo view('eatoday_web/establiment', $data);
        }
    }
    /**
     * Retorna la vista amb el llistat de categories
     */
    public function categories($codi_establiment = null, $id_categoria = null)
    {
        $data = $this->mirarSessióIniciada();

        $data["codi_establiment"] = $codi_establiment;
        $data["id_categoria"] = $id_categoria;

        echo view('eatoday_web/categoria', $data);
    }
    /**
     * Retorna la vista amb el llistat de cartes
     */
    public function cartes($codi_establiment = null, $id_categoria = null, $id_carta = null)
    {
        $data = $this->mirarSessióIniciada();

        $data["codi_establiment"] = $codi_establiment;
        $data["id_categoria"] = $id_categoria;
        $data["id_carta"] = $id_carta;

        echo view('eatoday_web/carta', $data);
    }
    /**
     * Retorna la vista amb el llistat de plats
     */
    public function plats($codi_establiment = null, $id_categoria = null, $id_carta = null, $id_plat = null)
    {
        $data = $this->mirarSessióIniciada();

        $data["codi_establiment"] = $codi_establiment;
        $data["id_categoria"] = $id_categoria;
        $data["id_carta"] = $id_carta;
        $data["id_plat"] = $id_plat;

        echo view('eatoday_web/plat', $data);
    }
    /**
     * Retorna la vista de la llista.
     * S'hi no hi ha iniciada la sessió et redirecciona al login.
     */
    public function cistella()
    {
        $data = $this->mirarSessióIniciada();
        $auth = service('authentication');
        if (!$auth->check()) {
            return redirect()->route('login');
        } else {
            $data["email"] = $auth->user()->email;
            return view("eatoday_web/cistella", $data);
        }
    }
}
