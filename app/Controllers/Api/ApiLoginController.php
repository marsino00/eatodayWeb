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

    public function modifyPassword()
    {
        // Validate basics first since some password rules rely on these fields
        $rules = [
            'email'    => 'required',
            'password' => 'required'
        ];
        if (!$this->validate($rules)) {

            $response = [
                'status' => 500,
                'error' => true,
                'message' => $this->validator->getErrors(),
                'data' => [],

            ];
        } else {

            $model = new UserModel();

            $token_data = json_decode($this->request->header("token-data")->getValue());
            $email = $this->request->getVar('email');
            if ($token_data->email == $email) {
                $password = $this->request->getVar('password');
                $model->modificarContrasenya($email, $password);
                $response = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Contrasenya canviada correctament',
                    'data' => [
                        'email' => $email,
                    ],
                ];
            } else {
                $response = [
                    'status' => 500,
                    'error' => true,
                    'message' => 'Usuari diferent',
                ];
            }
        }

        return $this->respondCreated($response);
    }

    public function modifyUser()
    {
        // Validate basics first since some password rules rely on these fields
        $rules = [
            'email'    => 'required',
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
            $name = $this->request->getVar('name');
            $surnames = $this->request->getVar('surnames');
            // , $name, $surnames
            $model->modificarUsuari($email, $name, $surnames);
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Usuari modificat correctament',
                'data' => [
                    'email' => $email,
                    'name' => $name,
                    'surnames' => $surnames,
                ]
            ];
        }

        return $this->respondCreated($response);
    }
    public function getUserByEmail($email = null)
    {
        // Validate basics first since some password rules rely on these fields
        $rules = [
            'email'    => 'required',
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
            // , $name, $surnames
            $data = $model->obtenirUsuari($email);
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Usuari obtingut',
                'data' => [
                    $data
                ]
            ];
        }

        return $this->respondCreated($response);
    }
    public function getGroupsByEmail($email = null)
    {
        // Validate basics first since some password rules rely on these fields
        $rules = [
            'email'    => 'required',
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
            // , $name, $surnames
            $data = $model->obtenirRols($email);
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Rols obtingut',
                'data' => [
                    $data
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
