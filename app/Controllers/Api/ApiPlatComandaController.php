<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\PlatComandaModel;

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

        if (!empty($data)) {

            $response = [
                'status' => 200,
                "error" => false,
                'messages' => 'Plats Comanda trobats',
                'data' => $data
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

        $data = $this->request->getVar('data');
        $array =  json_decode(json_encode($data, true));
        for ($i = 0; $i < count($array); $i++) {
            $model->afegirPlatComanda($array[$i]->{'id_plat'}, $array[$i]->{'id_comanda'}, $array[$i]->{'estat_plat'});
        }



        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'PlatComanda creat',

        ];

        return $this->respondCreated($response);
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
