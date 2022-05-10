<?php

namespace App\Controllers\Api;

use App\Controllers\AuthController;
use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class ApiLoginController extends ResourceController
{
    public function __construct()
    {
        // Most services in this controller require
        // the session to be started - so fire it up!
        $this->session = service('session');

        $this->config = config('Auth');
        $this->auth = service('authentication');
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        //
    }
    public function login()
    {
        helper("form");



        $auth = service('authentication');

        $credentials = [
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password_hash')
        ];

        $ver = $auth->attempt($credentials, false);


        $rules = [
            'email' => 'required',
            'password_hash' => 'required|min_length[4]'
        ];
        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());
        $model = new UserModel();
        $user = $model->getUserByMailOrUsername($this->request->getVar('email'));
        if (!$user) return $this->failNotFound('Email Not Found');

        $auth = service('authentication');

        $credentials = [
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password_hash')
        ];

        $verify = $auth->attempt($credentials, false);
        if (!$verify) return $this->fail($user->password_hash);

        /****************** GENERATE TOKEN ********************/
        helper("jwt");
        $APIGroupConfig = "default";
        $cfgAPI = new \Config\APIJwt($APIGroupConfig);

        $data = array(
            "uid" => $user->id,
            "name" => $user->username,
            "email" => $user->email
        );

        $token = newTokenJWT($cfgAPI->config(), $data);
        /****************** END TOKEN GENERATION **************/

        $response = [
            'status' => 200,
            'error' => false,
            'messages' => 'User logged In successfully',
            'token' => $token,
            "rev" => $ver
        ];
        return $this->respondCreated($response);
    }
    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
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
