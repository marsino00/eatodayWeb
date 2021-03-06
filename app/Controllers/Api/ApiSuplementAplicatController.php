<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\SuplementAplicatModel;

class ApiSuplementAplicatController extends ResourceController
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
        $model = new SuplementAplicatModel();
        $data = $model->getSuplementbyIdPlatComanda($id);

        if (!empty($data)) {

            $response = [
                'status' => 200,
                "error" => false,
                'messages' => 'Suplements aplicats trobats',
                'data' => $data
            ];
        } else {

            $response = [
                'status' => 500,
                "error" => true,
                'messages' => "No s'ha trobat cap suplement aplicat amb el id indicat",
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
        $rules = [
            'descripcio' => 'required',
            'preu' => 'required',
        ];

        if (!$this->validate($rules)) {

            $response = [
                'status' => 500,
                'error' => true,
                'message' => $this->validator->getErrors(),
                'data' => []
            ];
        } else {

            $model = new SuplementAplicatModel();

            $descripcio = $this->request->getVar('descripcio');
            $preu = $this->request->getVar('preu');


            $model->afegirSuplementAplicat($descripcio, $preu);

            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Suplement Aplicat creat',
                'data' => [
                    'descripcio' => $descripcio,
                    'preu' => $preu
                ]
            ];
        }

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
