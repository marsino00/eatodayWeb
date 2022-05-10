<?php

namespace App\Controllers\Api;

use App\Controllers\AuthController;
use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;
use Myth\Auth\Entities\User;
use Myth\Auth\Password;

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
            'password' => $this->request->getVar('password')
        ];

        $ver = $auth->attempt($credentials, false);


        $rules = [
            'email' => 'required',
            'password' => 'required|min_length[4]'
        ];
        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());
        $model = new UserModel();
        $user = $model->getUserByMailOrUsername($this->request->getVar('email'));
        if (!$user) return $this->failNotFound('Email Not Found');

        $auth = service('authentication');

        $credentials = [
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password')
        ];

        $verify = $auth->attempt($credentials, false);
        if (!$verify) return $this->fail("Error al iniciar sessió");

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

    public function register()
    {

        // Validate basics first since some password rules rely on these fields
        $rules = [
            'email'    => 'required|valid_email|is_unique[users.email]',
            'username' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]',
            'password'     => 'required|min_length[8]',
        ];
        if (!$this->validate($rules)) {

            $response = [
                'status' => 500,
                'error' => true,
                'message' => $this->validator->getErrors(),
                'data' => []
            ];
        } else {

            $model = new UserModel();

            $email = $this->request->getVar('email');
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $model->crearUsuari($email, $username, Password::hash($password));

            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Usuari creat',
                'data' => [
                    'email' => $email,
                    'username' => $username,
                ]
            ];
        }

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
