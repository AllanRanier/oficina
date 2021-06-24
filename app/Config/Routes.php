<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'AuthController::index');


$routes->get('/dashboard', 'DashboardController::index');

$routes->get('/clientes', 'ClienteController::index');

$routes->get('/vendas', 'VendasController::index');

$routes->get('/estoque', 'EstoqueController::index');

$routes->get('/fornecedor', 'FornecedorController::index');

$routes->get('/usuario', 'UsuariosController::index');
$routes->get('/usuario/novo', 'UsuariosController::create');
$routes->post('/usuario/save', 'UsuariosController::save');
$routes->get('/usuario/excluir/(:alphanum)', 'UsuariosController::delete/$1');
$routes->get('/usuario/editar/(:alphanum)', 'UsuariosController::update/$1');


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
