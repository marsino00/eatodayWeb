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


$routes->group("api", function ($routes) {
    $routes->group("establiment", function ($routes) {
        $routes->match(['get', 'options'], "list", "Api\ApiEstablimentController::index");
        $routes->match(['get', 'options'], "show/(:num)", "Api\ApiEstablimentController::show/$1");
    });
    $routes->group("categoria", function ($routes) {
        $routes->get("list/(:num)", "Api\ApiCategoriaController::show/$1");
    });
    $routes->group("carta", function ($routes) {
        $routes->get("list/(:num)", "Api\ApiCartaController::show/$1");
    });
    $routes->group("plat", function ($routes) {
        $routes->get("list/(:num)", "Api\ApiPlatController::show/$1");
        $routes->get("getPlatbyPlatComanda/(:num)", "Api\ApiPlatController::getPlatbyIdPlatComanda/$1");
    });
    $routes->group("alergen", function ($routes) {
        $routes->get("list/(:num)", "Api\ApiAlergenController::show/$1");
    });
    $routes->group("suplement", function ($routes) {
        $routes->get("list/(:num)", "Api\ApiSuplementController::show/$1");
    });
    $routes->group("taula", function ($routes) {
        $routes->get("list/(:num)", "Api\ApiTaulaController::show/$1");
    });
    $routes->group("comanda", function ($routes) {
        $routes->get("list", "Api\ApiComandaController::index");
        $routes->get("getByTable/(:num)", "Api\ApiComandaController::showByTable/$1");
        $routes->match(['get', 'options'], "getByClient/(:segment)", "Api\ApiComandaController::showByClient/$1");
        $routes->options("add", "Api\ApiComandaController::create");
        $routes->post("add", "Api\ApiComandaController::create", ["filter" => "jwt"]);

        $routes->options("update/(:num)", "Api\ApiComandaController::updateEstatComanda/$1");
        $routes->post("update/(:num)", "Api\ApiComandaController::updateEstatComanda/$1", ["filter" => "jwt"]);
    });
    $routes->group("platcomanda", function ($routes) {
        $routes->get("list/(:num)", "Api\ApiPlatComandaController::show/$1");
        $routes->options("add", "Api\ApiPlatComandaController::create");

        $routes->options("update/(:num)", "Api\ApiPlatComandaController::updateEstatPlat/$1");
        $routes->post("update/(:num)", "Api\ApiPlatComandaController::updateEstatPlat/$1", ["filter" => "jwt"]);

        $routes->post("add", "Api\ApiPlatComandaController::create", ["filter" => "jwt"]);
    });
    $routes->group("suplementaplicat", function ($routes) {
        $routes->get("list/(:num)", "Api\ApiSuplementAplicatController::show/$1");
        $routes->post("add", "Api\ApiSuplementAplicatController::create");
    });
    $routes->group("puntuacio", function ($routes) {
        $routes->get("list/(:num)", "Api\ApiPuntuacioController::show/$1");
    });
    $routes->group("user", function ($routes) {
        $routes->match(['options', 'post'], "login", "Api\ApiLoginController::login");
        $routes->match(['options', 'post'], "register", "Api\ApiLoginController::register");

        $routes->options("modifyPassword", "Api\ApiLoginController::modifyPassword");
        $routes->post("modifyPassword", "Api\ApiLoginController::modifyPassword", ["filter" => "jwt"]);
        $routes->options("modifyUser", "Api\ApiLoginController::modifyUser");
        $routes->post("modifyUser", "Api\ApiLoginController::modifyUser", ["filter" => "jwt"]);
        $routes->options("getUser", "Api\ApiLoginController::getUserByEmail");
        $routes->post("getUser", "Api\ApiLoginController::getUserByEmail", ["filter" => "jwt"]);
        $routes->options("getRoles", "Api\ApiLoginController::getGroupsByEmail");
        $routes->post("getRoles", "Api\ApiLoginController::getGroupsByEmail", ["filter" => "jwt"]);
    });
});



// $routes->get('/login', 'Home::index');
$routes->get('/', 'Home::index');
$routes->get('/perfil', 'PerfilController::index');
$routes->get('/introduirCodi', 'ClientController::insertarCodi');
$routes->get('/cistella', 'Home::cistella');
$routes->get('/establiments', 'Home::establiments');
$routes->get('/establiments/(:num)', 'Home::establiments/$1');
$routes->get('/establiments/(:num)/categories/(:num)', 'Home::categories/$1/$2');
$routes->get('/establiments/(:num)/categories/(:num)/cartes/(:num)', 'Home::cartes/$1/$2/$3');
$routes->get('/establiments/(:num)/categories/(:num)/cartes/(:num)/plats/(:num)', 'Home::plats/$1/$2/$3/$4');


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
