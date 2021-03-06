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
$routes->get('/', 'Auth::index');
$routes->post('/login', 'Auth::logar');

$routes->group('dashboard',['filter' => 'authFilter'], function($routes){
	$routes->get('', 'DashboardController::index');

});
$routes->group('clientes',['filter' => 'authFilter'], function($routes){
	$routes->get('', 'ClientesController::index');
	$routes->get('novo', 'ClientesController::create');
	$routes->post('save', 'ClientesController::save');
	$routes->post('excluir/(:alphanum)', 'ClientesController::delete/$1');
	$routes->get('editar/(:alphanum)', 'ClientesController::update/$1');

});

$routes->group('orcamento',['filter' => 'authFilter'], function($routes){
	$routes->get('', 'OrcamentoController::index');
	$routes->get('novo', 'OrcamentoController::create');
	$routes->get('editar/(:alphanum)', 'OrcamentoController::update/$1');
	$routes->post('save', 'OrcamentoController::save');
	$routes->post('excluir/(:alphanum)', 'OrcamentoController::delete/$1');
});

$routes->group('servicos',['filter' => 'authFilter'], function($routes){
	$routes->get('', 'ServicoController::index');
	$routes->get('novo', 'ServicoController::create');
	$routes->get('editar/(:alphanum)', 'ServicoController::update/$1');
	$routes->post('save', 'ServicoController::save');
	$routes->post('excluir/(:alphanum)', 'ServicoController::delete/$1');
});



$routes->group('usuario',['filter' => 'authFilter'], function($routes){
	$routes->get('', 'UsuariosController::index');
	$routes->get('novo', 'UsuariosController::create');
	$routes->get('editar/(:alphanum)', 'UsuariosController::update/$1');
	$routes->post('save', 'UsuariosController::save');
	$routes->post('excluir/(:alphanum)', 'UsuariosController::delete/$1');

});

// $routes->get('/usuario', 'UsuariosController::index');
// $routes->get('/usuario/novo', 'UsuariosController::create');
// $routes->post('/usuario/save', 'UsuariosController::save');
// $routes->get('/usuario/excluir/(:alphanum)', 'UsuariosController::delete/$1');
// $routes->get('/usuario/editar/(:alphanum)', 'UsuariosController::update/$1');


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
