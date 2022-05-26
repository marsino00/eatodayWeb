<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Myth\Auth\Authentication\LocalAuthentication;

class ValidaUsuarisFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        //@see https://codeigniter.com/user_guide/incoming/filters.html

        if ($arguments == null) {
            if (!session()->get('loggedIn')) {
                return redirect()->to(base_url('/login'));
            }
        } else {
            $auth = service('authorization');
            // dd($auth);
            if ($auth->check()) {
                // dd($auth->user());
                $rols = $auth->user()->getRoles();
                $rolsaux = [];
                foreach ($rols as $rol) {
                    # code...
                    array_push($rolsaux, $rol);
                }
            } else {
                session()->setFlashdata('error', "Error! L'usuari no té permisos per a accedir a aquest lloc web");
            }
            // $rols = $auth->user()->getRoles();
            // dd($rols);
            // dd($auth->user()->getRoles());

            if (!in_array(session()->get('name'), $arguments)) {
                return redirect()->back();
                // return redirect()->to(base_url('userdemo/login'));
            }
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
