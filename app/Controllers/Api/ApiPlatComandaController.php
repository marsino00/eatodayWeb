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
        $rules = [
            'id_plat' => 'required',
            'id_comanda' => 'required',
            'estat_plat' => 'required'
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

            $id_plat = $this->request->getVar('id_plat');
            $id_comanda = $this->request->getVar('id_comanda');
            $estat_plat = $this->request->getVar('estat_plat');


            $model->afegirPlatComanda($id_plat, $id_comanda, $estat_plat);

            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'PlatComanda creat',
                'data' => [
                    'id_plat' => $id_plat,
                    'id_comanda' => $id_comanda,
                    'estat_plat' => $estat_plat
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
