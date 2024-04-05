<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'HomeController::index', ['as' => 'home']);

//login - register
$routes->get('Auth/login', 'Auth\AuthController::showLoginForm');
$routes->post('Auth/login', 'Auth\AuthController::login');
$routes->get('Auth/register', 'Auth\AuthController::showRegistrationForm');
$routes->post('Auth/register', 'Auth\AuthController::register');
$routes->get('Auth/logout', 'Auth\Auth\AuthController::logout');

//dashboard routes
$routes->get('Admin/admin_dashboard', 'Admin\AdminController::dashboard', ['as' => 'admin.dashboard']);
$routes->get('Donante/donante_dashboard', 'Donante\DonanteController::dashboard', ['as' => 'donante.dashboard']);
$routes->get('Receptor/receptor_dashboard', 'Receptor\ReceptorController::dashboard', ['as' => 'receptor.dashboard']);
$routes->get('Voluntario/voluntario_dashboard', 'Voluntario\VoluntarioController::dashboard', ['as' => 'voluntario.dashboard']);


// // Rutas para el panel de administración
// $routes->group('admin', ['filter' => 'adminFilter'], function ($routes) {
//     $routes->get('dashboard', 'Admin\AdminController::dashboard');
//     $routes->resource('usuarios', ['controller' => 'Admin\AdminController']);
//     $routes->resource('donaciones', ['controller' => 'Admin\AdminController']);
//     $routes->resource('solicitudes', ['controller' => 'Admin\AdminController']);
//     $routes->resource('postulaciones', ['controller' => 'Admin\AdminController']);
//     // Otras rutas relacionadas con el panel de administración
// });

// // Rutas para donantes
// $routes->group('donantes', ['filter' => 'donanteFilter'], function ($routes) {
//     $routes->get('dashboard', 'Donante\DonanteController::dashboard');
//     $routes->resource('donaciones', ['controller' => 'Donante\DonanteController']);
//     $routes->resource('solicitudes', ['controller' => 'Donante\DonanteController']);
//     $routes->get('perfil', 'Donante\DonanteController::showPerfil');
//     $routes->post('perfil', 'Donante\DonanteController::updatePerfil');
//     // Otras rutas relacionadas con donantes
// });

// // Rutas para receptores
// $routes->group('receptores', ['filter' => 'receptorFilter'], function ($routes) {
//     $routes->get('dashboard', 'Receptor\ReceptorController::dashboard');
//     $routes->resource('solicitudes', ['controller' => 'Receptor\ReceptorController']);
//     $routes->resource('donaciones', ['controller' => 'Receptor\ReceptorController']);
//     $routes->get('perfil', 'Receptor\ReceptorController::showPerfil');
//     $routes->post('perfil', 'Receptor\ReceptorController::updatePerfil');
//     // Otras rutas relacionadas con receptores
// });

// // Rutas para voluntarios
// $routes->group('voluntarios', ['filter' => 'voluntarioFilter'], function ($routes) {
//     $routes->get('dashboard', 'Voluntario\VoluntarioController::dashboard');
//     $routes->resource('postulaciones', ['controller' => 'Voluntario\VoluntarioController']);
//     $routes->get('perfil', 'Voluntario\VoluntarioController::showPerfil');
//     $routes->post('perfil', 'Voluntario\VoluntarioController::updatePerfil');
//     // Otras rutas relacionadas con voluntarios
// });