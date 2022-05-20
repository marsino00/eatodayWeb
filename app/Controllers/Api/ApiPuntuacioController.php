<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\PuntuacioModel;

class ApiPuntuacioController extends ResourceController
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
    public function show($codi_establiment = null)
    {
        $model = new PuntuacioModel();
        $data = $model->obtenirPuntuacio($codi_establiment);

        if (!empty($data)) {

            $response = [
                'status' => 200,
                "error" => false,
                'messages' => 'Puntuacio trobada',
                'data' => $data
            ];
        } else {

            $response = [
                'status' => 500,
                "error" => true,
                'messages' => "No s'ha trobat cap puntuacio amb els ids indicats",
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
            'valoracio' => 'required',
            'comentari' => 'required',
            'email' => 'required',
            'codi_establiment' => 'required',
        ];

        if (!$this->validate($rules)) {

            $response = [
                'status' => 500,
                'error' => true,
                'message' => $this->validator->getErrors(),
                'data' => []
            ];
        } else {

            $model = new PuntuacioModel();

            $valoracio = $this->request->getVar('valoracio');
            $comentari = $this->request->getVar('comentari');
            $email = $this->request->getVar('email');
            $codi_establiment = $this->request->getVar('codi_establiment');


            $model->afegirPuntuacio($valoracio, $comentari, $email, $codi_establiment);

            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Valoració creada'
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
