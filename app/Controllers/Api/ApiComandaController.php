<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ComandaModel;

class ApiComandaController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {

        $model = new ComandaModel();
        $response = [
            'status' => 200,
            "error" => false,
            'messages' => "Llistat de comandes no finalitzades",
            'data' => $model->getAllComandes()
        ];

        return $this->respond($response);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function showByTable($id = null)
    {
        $model = new ComandaModel();
        $data = $model->getComandabyCodiTaula($id);

        if (!empty($data)) {

            $response = [
                'status' => 200,
                "error" => false,
                'messages' => 'Comanda trobada',
                'data' => $data
            ];
        } else {

            $response = [
                'status' => 500,
                "error" => true,
                'messages' => "No s'ha trobat cap Comanda amb el codi de taula indicat",
                'data' => []
            ];
        }

        return $this->respond($response);
    }
    public function showByClient($id = null)
    {
        $model = new ComandaModel();
        $data = $model->getComandabyClient($id);

        if (!empty($data)) {

            $response = [
                'status' => 200,
                "error" => false,
                'messages' => 'Comanda trobada',
                'data' => $data
            ];
        } else {

            $response = [
                'status' => 500,
                "error" => true,
                'messages' => "No s'ha trobat cap Comanda amb el usuari indicat",
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
            'estat_comanda' => 'required',
            'comensals' => 'required',
            'codi_taula' => 'required',
            'id_client' => 'required',
        ];

        if (!$this->validate($rules)) {

            $response = [
                'status' => 500,
                'error' => true,
                'message' => $this->validator->getErrors(),
                'data' => []
            ];
        } else {

            $model = new ComandaModel();

            $estat_comanda = $this->request->getVar('estat_comanda');
            $comensals = $this->request->getVar('comensals');
            $codi_taula = $this->request->getVar('codi_taula');
            $id_client = $this->request->getVar('id_client');


            $var = $model->afegirComanda($estat_comanda, $comensals, $codi_taula, $id_client);

            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Comanda creada',
                'data' => [
                    'estat_comanda' => $estat_comanda,
                    'comensals' => $comensals,
                    'codi_taula' => $codi_taula,
                    'id_client' => $id_client,
                    'id_comanda' => $var
                ]
            ];
        }

        return $this->respondCreated($response);
    }
    public function updateEstatComanda($id = null)
    {
        $rules = [
            'estat_comanda' => 'required',
        ];


        if (!$this->validate($rules)) {

            $response = [
                'status' => 500,
                'error' => true,
                'message' => $this->validator->getErrors(),
                'data' => []
            ];
        } else {

            $model = new ComandaModel();

            if ($model->findAll($id)) {
                $estat_comanda = $this->request->getVar('estat_comanda');
                $model->changeEstatComanda($id, $estat_comanda);

                $response = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Estat Comanda canviat correctament',
                    'data' => [
                        'id_comanda' => $id,
                        'Estat comanda' => $estat_comanda
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
