<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\PlatComandaModel;
use App\Models\SuplementAplicatModel;
use App\Models\PlatComandaSuplementAplicatModel;

class ApiPlatComandaController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        //
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $model = new PlatComandaModel();
        $data = $model->getPlatComandabyIdComanda($id);
        $array =  json_decode(json_encode($data, true));
        for ($i = 0; $i < count($array); $i++) {
            $array[$i]->suplements = $model->getSuplementAplicatByPlatComanda($array[$i]->id_plat_comanda);
        }
        if (!empty($data)) {

            $response = [
                'status' => 200,
                "error" => false,
                'messages' => 'Plats Comanda trobats',
                'data' => $array,
                // 'aaaaaaaa' => $aaaaaaaa

            ];
        } else {

            $response = [
                'status' => 500,
                "error" => true,
                'messages' => "No s'ha trobat cap platComanda amb el id indicat",
                'data' => []
            ];
        }

        return $this->respond($response);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $model = new PlatComandaModel();
        $model2 = new SuplementAplicatModel();
        $model3 = new PlatComandaSuplementAplicatModel();
        $data = $this->request->getVar('data');
        $array =  json_decode(json_encode($data, true));

        for ($i = 0; $i < count($array); $i++) {
            $id_plat_comanda = $model->afegirPlatComanda($array[$i]->{'id_plat'}, $array[$i]->{'id_comanda'}, $array[$i]->{'estat_plat'});
            if (isset($array[$i]->suplements)) {
                $suplements = json_decode(json_encode($array[$i]->suplements, true));
                for ($j = 0; $j < count($suplements); $j++) {
                    $id_suplement_aplicat = $model2->afegirSuplementAplicat($suplements[$j]->descripcio, $suplements[$j]->preu);
                    $model3->afegirRelacioPCSA($id_plat_comanda, $id_suplement_aplicat);
                }
            }
        }


        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'PlatComanda creat',
        ];

        return $this->respondCreated($response);
    }
    public function updateEstatPlat($id = null)
    {
        $rules = [
            'estat_plat' => 'required',
        ];


        if (!$this->validate($rules)) {

            $response = [
                'status' => 500,
                'error' => true,
                'message' => $this->validator->getErrors(),
                'data' => []
            ];
        } else {

            $model = new PlatComandaModel();

            if ($model->findAll($id)) {
                $estat_plat = $this->request->getVar('estat_plat');
                if ($estat_plat == "ELABORAT") {
                    $hora = "hora_elaborat";
                } elseif ($estat_plat == "DEMANAT") {
                    $hora = "hora_demanat";
                } else {
                    $hora = "hora_lliurat";
                }
                $model->changeEstatPlat($id, $estat_plat, $hora);

                $response = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Estat Plat canviat correctament',
                    'data' => [
                        'id_comanda' => $id,
                        'Estat comanda' => $estat_plat
                    ]
                ];
            } else {

                $response = [
                    'status' => 500,
                    "error" => true,
                    'messages' => "No s'ha trobat comanda",
                    'data' => []
                ];
            }
        }

        return $this->respondUpdated($response);
    }
    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
