<?php

namespace App\Controllers;

use App\Models\EstablimentModel;
use App\Models\CategoriaModel;
use CodeIgniter\RESTful\ResourceController;

class ApisController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $model = new EstablimentModel();
        $response = [
            'status' => 200,
            "error" => false,
            'messages' => "Llistat d'establiments",
            'data' => $model->findAll()
        ];

        return $this->respond($response);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $model = new EstablimentModel();
        $data = $model->getEstablimentbyId($id);

        if (!empty($data)) {

            $response = [
                'status' => 200,
                "error" => false,
                'messages' => 'Establiment trobat',
                'data' => $data
            ];
        } else {

            $response = [
                'status' => 500,
                "error" => true,
                'messages' => "No s'ha trobat cap establiment amb el codi d'establiment indicat",
                'data' => []
            ];
        }

        return $this->respond($response);
    }

    public function obtenirCategories($id = null)
    {
        $model = new CategoriaModel();
        $data = $model->getCategoriesbyCodiEstabliment($id);

        if (!empty($data)) {

            $response = [
                'status' => 200,
                "error" => false,
                'messages' => 'Categoria trobada',
                'data' => $data
            ];
        } else {

            $response = [
                'status' => 500,
                "error" => true,
                'messages' => "No s'ha trobat cap categoria amb el codi d'establiment indicat",
                'data' => []
            ];
        }

        return $this->respond($response);
    }
    public function obtenirCarta($id = null)
    {
        $model = new EstablimentModel();
        $data = $model->getCartabyIdCategoria($id);

        if (!empty($data)) {

            $response = [
                'status' => 200,
                "error" => false,
                'messages' => 'Carta trobada',
                'data' => $data
            ];
        } else {

            $response = [
                'status' => 500,
                "error" => true,
                'messages' => "No s'ha trobat cap carta amb el id de categoria indicat",
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
        //
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
