<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EstablimentModel;
use SIENSIS\KpaCrud\Libraries\KpaCrud;
use App\Models\UserModel;

class KpaCrudController extends BaseController
{
    /**
     * Funció que vaig cridant a les diferents pàgines del web per a controlar si s'ha iniciat sessió i obtenir els 
     * diferents rols del usuari
     */
    private function mirarSessióIniciada()
    {
        $auth = service('authentication');
        $esAdmin = false;

        if ($auth->check()) {
            // dd($auth->user());
            $rols = $auth->user()->getRoles();
            $rolsaux = [];
            foreach ($rols as $rol) {
                # code...
                if ($rol == "administrador principal") {
                    $esAdmin = true;
                }
            }
        } else {
        }
        return $esAdmin;
    }

    /** A partir de la llibreria KPACrud, crea i retorna la vista per a la gestió d'usuaris */
    public function users()
    {
        $esAdmin = $this->mirarSessióIniciada();
        // dd($esAdmin);
        if ($esAdmin) {
            $crud = new KpaCrud(); //loads default configuration

            $crud->setTable('users');
            $crud->setPrimaryKey('id');

            if ($crud->isExportMode()) {
                $crud->setColumns(['username', 'email', 'active']);
                $crud->addWhere('users.active=1');
            } else {
                $crud->setColumns(['id', 'email', 'username', 'name', 'surnames']);
            }
            $model = new EstablimentModel();
            $a = $model->obtenirEstabliments();
            $array = [];
            for ($i = 0; $i < count($a); $i++) {
                array_push($array, [$a[$i]["codi_establiment"] => $a[$i]["nom_establiment"]]);
            }
            $crud->setColumnsInfo([
                'id' => ['name' => 'Codi'],
                'email' => [
                    'name' => 'Correu electrònic',
                    'html_atts' => [
                        'required',
                        'placeholder="Introdueix l\'adreça mail de l\'usuari"'
                    ],
                    'type' => KpaCrud::EMAIL_FIELD_TYPE
                ],
                'codi_establiment' => [
                    'name' => 'Establiment',
                    'type' => KpaCrud::DROPDOWN_FIELD_TYPE,
                    'options' => $array,
                ],
                'username' => [
                    'name' => 'Nom usuari',
                    'html_atts' => [
                        "required",
                        "placeholder=\"Introdueix el nom d'usuari\""
                    ],
                ],
                'active' => [
                    'name' => 'Actiu',
                    'type' => KpaCrud::DROPDOWN_FIELD_TYPE,
                    'options' => ['' => "Tria opcio", 1 => 'Actiu', 0 => 'No actiu'],
                    'html_atts' => [
                        "required",
                    ],
                    'default' => '0',
                ],

                'password_hash' => [
                    'type' => KpaCrud::PASSWORD_FIELD_TYPE,
                    'name' => 'Password',
                    'html_atts' => []
                ],
                'force_pass_reset' => [
                    'name' => 'Forçar reset password',
                    'type' => KpaCrud::INVISIBLE_FIELD_TYPE,
                ],

                'reset_expires' => [
                    'type' => KpaCrud::INVISIBLE_FIELD_TYPE,
                ],
                'activate_hash' => ['type' => KpaCrud::INVISIBLE_FIELD_TYPE],
                'reset_hash' => ['type' => KpaCrud::INVISIBLE_FIELD_TYPE],
                'reset_at' => ['type' => KpaCrud::INVISIBLE_FIELD_TYPE],
                'status' => ['type' => KpaCrud::INVISIBLE_FIELD_TYPE],
                'status_message' => ['type' => KpaCrud::INVISIBLE_FIELD_TYPE],

            ]);

            $data['output'] = $crud->render();
            $data["title"] = "Gestió d'Usuaris";

            return view('kpacrud/sample', $data);
        } else {
            return redirect()->to(base_url() . "/login");
        }
    }

    /** A partir de la llibreria KPACrud, crea i retorna la vista per a la gestió d'establiments */

    public function establiment()
    {

        $crud = new KpaCrud(); //loads default configuration

        $crud->setTable('establiment');
        $crud->setPrimaryKey('codi_establiment');


        $crud->setColumns(['codi_establiment', 'nom_establiment', 'tipus_establiment', 'descripcio', 'pais', 'adreca', 'telefon', 'horari']);
        $crud->setColumnsInfo([
            // 'codi_establiment' => ['name' => 'Codi'],
            'nom_establiment' => [
                'name' => 'Nom establiment',

            ],
            'tipus_establiment' => [
                'name' => "Tipus d'establiment",
            ],
            'descripcio' => [
                'name' => "Descripció",
                'type' => KpaCrud::TEXTAREA_FIELD_TYPE,

            ], 'pais' => [
                'name' => "País",
            ], 'adreca' => [
                'name' => "Adreça",
            ], 'telefon' => [
                'name' => "Telèfon",
            ], 'horari' => [
                'name' => "Horari",
            ],
        ]);

        $data['output'] = $crud->render();
        $data["title"] = "Gestió d'Establiments";

        return view('kpacrud/sample', $data);
    }

    /** A partir de la llibreria KPACrud, crea i retorna la vista per a la gestió de categories */

    public function categoria()
    {

        $crud = new KpaCrud(); //loads default configuration

        $crud->setTable('categoria');
        $crud->setPrimaryKey('id_categoria');


        $crud->setColumns(['id_categoria', 'nom', 'descripcio']);

        $model = new EstablimentModel();
        $a = $model->obtenirEstabliments();
        $array = [];
        for ($i = 0; $i < count($a); $i++) {
            array_push($array, [$a[$i]["codi_establiment"] => $a[$i]["nom_establiment"]]);
        }
        $crud->setColumnsInfo([
            'nom' => [
                'name' => 'Nom de la categoria',

            ],

            'descripcio' => [
                'name' => "Descripció",
                'type' => KpaCrud::TEXTAREA_FIELD_TYPE,

            ],
            'active' => [
                'name' => 'Actiu',
                'type' => KpaCrud::DROPDOWN_FIELD_TYPE,
                'options' => ['' => "Tria opcio", 1 => 'Actiu', 0 => 'No actiu'],
                'html_atts' => [
                    "required",
                ],
                'default' => '0',
            ],
            'codi_establiment' => [
                'name' => 'Establiment',
                'type' => KpaCrud::DROPDOWN_FIELD_TYPE,
                'options' => $array,
            ],
        ]);

        $data['output'] = $crud->render();
        $data["title"] = "Gestió de Categories";

        return view('kpacrud/sample', $data);
    }

    /** A partir de la llibreria KPACrud, crea i retorna la vista per a la gestió de cartes */

    public function carta()
    {

        $crud = new KpaCrud(); //loads default configuration

        $crud->setTable('carta');
        $crud->setPrimaryKey('id_carta');


        $crud->setColumns(['id_carta', 'nom', 'descripcio']);

        $model = new EstablimentModel();

        $crud->setColumnsInfo([
            'nom' => [
                'name' => 'Nom de la carta',

            ],

            'descripcio' => [
                'name' => "Descripció",
                'type' => KpaCrud::TEXTAREA_FIELD_TYPE,

            ],
            'active' => [
                'name' => 'Actiu',
                'type' => KpaCrud::DROPDOWN_FIELD_TYPE,
                'options' => ['' => "Tria opcio", 1 => 'Actiu', 0 => 'No actiu'],
                'html_atts' => [
                    "required",
                ],
                'default' => '0',
            ],

        ]);

        $data['output'] = $crud->render();
        $data["title"] = "Gestió de Cartes";

        return view('kpacrud/sample', $data);
    }

    /** A partir de la llibreria KPACrud, crea i retorna la vista per a la gestió de plats */

    public function plat()
    {

        $crud = new KpaCrud(); //loads default configuration

        $crud->setTable('plat');
        $crud->setPrimaryKey('id_plat');


        $crud->setColumns(['id_plat', 'nom', 'tipus', 'descripcio_breu', 'preu']);


        $crud->setColumnsInfo([
            'nom' => [
                'name' => 'Nom del plat',

            ],
            // 

        ]);

        $data['output'] = $crud->render();
        $data["title"] = "Gestió de Plats";

        return view('kpacrud/sample', $data);
    }

    /** A partir de la llibreria KPACrud, crea i retorna la vista per a la gestió d'alergens */

    public function alergen()
    {

        $crud = new KpaCrud(); //loads default configuration

        $crud->setTable('alergen');
        $crud->setPrimaryKey('codi_alergen');


        $crud->setColumns(['codi_alergen', 'descripcio']);

        $model = new EstablimentModel();

        $crud->setColumnsInfo([

            'descripcio' => [
                'name' => "Descripció",
                'type' => KpaCrud::TEXTAREA_FIELD_TYPE,

            ],

        ]);

        $data['output'] = $crud->render();
        $data["title"] = "Gestió d'Alergens";

        return view('kpacrud/sample', $data);
    }

    /** A partir de la llibreria KPACrud, crea i retorna la vista per a la gestió de suplements */

    public function suplement()
    {

        $crud = new KpaCrud(); //loads default configuration

        $crud->setTable('suplement');
        $crud->setPrimaryKey('id_suplement');


        $crud->setColumns(['id_suplement',  'descripcio', 'preu']);

        $model = new EstablimentModel();

        $crud->setColumnsInfo([
            'nom' => [
                'name' => 'Nom del Suplement',

            ],

            'descripcio' => [
                'name' => "Descripció",
                'type' => KpaCrud::TEXTAREA_FIELD_TYPE,

            ],


        ]);

        $data['output'] = $crud->render();
        $data["title"] = "Gestió de Suplements";

        return view('kpacrud/sample', $data);
    }

    /** A partir de la llibreria KPACrud, crea i retorna la vista per a la gestió de taules */

    public function taula()
    {
        $model = new EstablimentModel();
        $a = $model->obtenirEstabliments();
        $array = [];
        for ($i = 0; $i < count($a); $i++) {
            array_push($array, [$a[$i]["codi_establiment"] => $a[$i]["nom_establiment"]]);
        }

        $crud = new KpaCrud(); //loads default configuration

        $crud->setTable('taula');
        $crud->setPrimaryKey('codi_taula');


        $crud->setColumns(['codi_taula',  'codi_establiment']);

        $model = new EstablimentModel();

        $crud->setColumnsInfo([
            'codi_establiment' => [
                'name' => 'Establiment',
                'type' => KpaCrud::DROPDOWN_FIELD_TYPE,
                'options' => $array,
            ],

        ]);

        $data['output'] = $crud->render();
        $data["title"] = "Gestió de Suplements";

        return view('kpacrud/sample', $data);
    }
}
