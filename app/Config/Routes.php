<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->group("api", function ($routes) {
    $routes->group("establiment", function ($routes) {
        $routes->match(['get', 'options'], "list", "Api" . DIRECTORY_SEPARATOR . "ApiEstablimentController::index");
        $routes->match(['get', 'options'], "show/(:num)", "Api" . DIRECTORY_SEPARATOR . "ApiEstablimentController::show/$1");
    });
    $routes->group("categoria", function ($routes) {
        $routes->get("list/(:num)", "Api" . DIRECTORY_SEPARATOR . "ApiCategoriaController::show/$1");
    });
    $routes->group("carta", function ($routes) {
        $routes->get("list/(:num)", "Api" . DIRECTORY_SEPARATOR . "ApiCartaController::show/$1");
    });
    $routes->group("plat", function ($routes) {
        $routes->get("list/(:num)", "Api" . DIRECTORY_SEPARATOR . "ApiPlatController::show/$1");
    });
    $routes->group("alergen", function ($routes) {
        $routes->get("list/(:num)", "Api" . DIRECTORY_SEPARATOR . "ApiAlergenController::show/$1");
    });
    $routes->group("suplement", function ($routes) {
        $routes->get("list/(:num)", "Api" . DIRECTORY_SEPARATOR . "ApiSuplementController::show/$1");
    });
    $routes->group("taula", function ($routes) {
        $routes->get("list/(:num)", "Api" . DIRECTORY_SEPARATOR . "ApiTaulaController::show/$1");
    });
    $routes->group("comanda", function ($routes) {
        $routes->get("getByTable/(:num)", "Api" . DIRECTORY_SEPARATOR . "ApiComandaController::showByTable/$1");
        $routes->get("getByUser/(:segment)", "Api" . DIRECTORY_SEPARATOR . "ApiComandaController::showByUser/$1");
        $routes->post("add", "Api" . DIRECTORY_SEPARATOR . "ApiComandaController::create");
        $routes->post("update/(:num)", "Api" . DIRECTORY_SEPARATOR . "ApiComandaController::updateEstatComanda/$1");
    });
    $routes->group("platcomanda", function ($routes) {
        $routes->get("list/(:num)", "Api" . DIRECTORY_SEPARATOR . "ApiPlatComandaController::show/$1");
        $routes->post("add", "Api" . DIRECTORY_SEPARATOR . "ApiPlatComandaController::create");
    });
    $routes->group("suplementaplicat", function ($routes) {
        $routes->get("list/(:num)", "Api" . DIRECTORY_SEPARATOR . "ApiSuplementAplicatController::show/$1");
        $routes->post("add", "Api" . DIRECTORY_SEPARATOR . "ApiSuplementAplicatController::create");
    });
    $routes->group("puntuacio", function ($routes) {
        $routes->get("list/(:num)", "Api" . DIRECTORY_SEPARATOR . "ApiPuntuacioController::show/$1");
    });
    $routes->group("user", function ($routes) {
        $routes->match(['options', 'post'], "login", "Api" . DIRECTORY_SEPARATOR . "ApiLoginController::login");
        $routes->match(['options', 'post'], "register", "Api" . DIRECTORY_SEPARATOR . "ApiLoginController::register");
        $routes->match(['options', 'post'], "modifyPassword", "Api" . DIRECTORY_SEPARATOR . "ApiLoginController::modifyPassword", ["filter" => "jwt"]);
        $routes->match(['options', 'post'], "modifyUser", "Api" . DIRECTORY_SEPARATOR . "ApiLoginController::modifyUser", ["filter" => "jwt"]);
    });
});



// $routes->get('/login', 'Home::index');
$routes->get('/', 'Home::index');
// Login/out
$routes->get('login', 'AuthController::login', ['as' => 'login']);
$routes->post('login', 'AuthController::attemptLogin');
$routes->get('logout', 'AuthController::logout');

// Registration
$routes->get('register', 'AuthController::register', ['as' => 'register']);
$routes->post('register', 'AuthController::attemptRegister');

// Activation
$routes->get('activate-account', 'AuthController::activateAccount', ['as' => 'activate-account']);
$routes->get('resend-activate-account', 'AuthController::resendActivateAccount', ['as' => 'resend-activate-account']);

// Forgot/Resets
$routes->get('forgot', 'AuthController::forgotPassword', ['as' => 'forgot']);
$routes->post('forgot', 'AuthController::attemptForgot');
$routes->get('reset-password', 'AuthController::resetPassword', ['as' => 'reset-password']);
$routes->post('reset-password', 'AuthController::attemptReset');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
