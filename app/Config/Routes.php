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
        $routes->get("list", "ApisController::index");
        // $routes->post("add", "ApiNoticiesController::create");
        $routes->get("show/(:num)", "ApisController::show/$1");
        $routes->get("obtenirCategories/(:num)", "ApisController::obtenirCategories/$1");
        // $routes->put("update/(:num)", "ApiNoticiesController::update/$1");
        // $routes->delete("delete/(:num)", "ApiNoticiesController::delete/$1");
    });
});

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
