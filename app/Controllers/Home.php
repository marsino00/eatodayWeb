<?php

namespace App\Controllers;

use Myth\Auth\Authentication\LocalAuthentication;

class Home extends BaseController
{

    private function mirarSessióIniciada()
    {
        $auth = service('authentication');

        if ($auth->check()) {

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
        }

        return $data;
    }

    public function index()
    {
        $data = $this->mirarSessióIniciada();

        // $mpdf = new \Mpdf\Mpdf();
        // $html = view('eatoday_web/cistella', $data);
        // $mpdf->WriteHTML($html);
        // $this->response->setHeader('Content-Type', 'application/pdf');
        // $mpdf->Output('arjun.pdf', 'I'); // opens in browser
        //$mpdf->Output('arjun.pdf','D'); // it downloads the file into the user system, with give name
        //return view('welcome_message');


        return view('eatoday_web/index', $data);
    }
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
    public function categories($codi_establiment = null, $id_categoria = null)
    {
        $data = $this->mirarSessióIniciada();

        $data["codi_establiment"] = $codi_establiment;
        $data["id_categoria"] = $id_categoria;

        echo view('eatoday_web/categoria', $data);
    }
    public function cartes($codi_establiment = null, $id_categoria = null, $id_carta = null)
    {
        $data = $this->mirarSessióIniciada();

        $data["codi_establiment"] = $codi_establiment;
        $data["id_categoria"] = $id_categoria;
        $data["id_carta"] = $id_carta;

        echo view('eatoday_web/carta', $data);
    }
    public function plats($codi_establiment = null, $id_categoria = null, $id_carta = null, $id_plat = null)
    {
        $data = $this->mirarSessióIniciada();

        $data["codi_establiment"] = $codi_establiment;
        $data["id_categoria"] = $id_categoria;
        $data["id_carta"] = $id_carta;
        $data["id_plat"] = $id_plat;

        echo view('eatoday_web/plat', $data);
    }
    public function cistella()
    {
        $data = $this->mirarSessióIniciada();
        $auth = service('authentication');

        if (!$auth->check()) {
            // $this->session->set('redirect_url', current_url());
            return redirect()->route('login');
        } else {
            return view("eatoday_web/cistella", $data);
        }
    }
}
