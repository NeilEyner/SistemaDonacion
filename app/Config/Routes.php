<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'HomeController::index', ['as' => 'home']);
$routes->get('/dashboard/index', 'HomeController::index2');
$routes->get('contacto', 'HomeController::contacto');

//login - register
$routes->get('Auth/login', 'Auth\AuthController::showLoginForm');
$routes->post('Auth/login', 'Auth\AuthController::login');
$routes->get('Auth/register', 'Auth\AuthController::showRegistrationForm');
$routes->post('Auth/register', 'Auth\AuthController::register');
$routes->get('Auth/logout', 'Auth\AuthController::logout');
//----------------------------------------------------------
//---------------------ADMINISTRADOR------------------------
//----------------------------------------------------------
//dashboard routes
$routes->get('Admin/admin_dashboard', 'Admin\AdminController::dashboard', ['as' => 'admin.dashboard']);
$routes->get('Admin/admin_donaciones', 'Admin\AdminController::donaciones', ['as' => 'admin.donaciones']);
$routes->get('Admin/admin_postulaciones', 'Admin\AdminController::postulaciones', ['as' => 'admin.postulaciones']);
$routes->get('Admin/admin_solicitudes', 'Admin\AdminController::solicitudes', ['as' => 'admin.solicitudes']);
$routes->get('Admin/admin_usuarios', 'Admin\AdminController::usuarios', ['as' => 'admin.usuarios']);
//admin usuarios
$routes->get('Admin/editar_usuario/(:num)', 'Admin\AdminController::editar_usuario/$1');
$routes->get('Admin/eliminar_usuario/(:num)', 'Admin\AdminController::eliminar_usuario/$1');
$routes->post('Admin/editar_usuario/actualizar_usuario', 'Admin\AdminController::actualizar_usuario');
$routes->get('Admin/crear_usuario/', 'Admin\AdminController::crear_usuario');
$routes->post('Admin/guardar_usuario/', 'Admin\AdminController::guardar_usuario');
// admin donaciones 
$routes->get('Admin/admin_donaciones/aceptar/(:num)', 'Admin\AdminController::aceptar_donacion/$1');
$routes->get('Admin/admin_donaciones/rechazar/(:num)', 'Admin\AdminController::rechazar_donacion/$1');
$routes->get('Admin/admin_donaciones/detalles/(:num)', 'Admin\AdminController::detalles_donacion/$1');
$routes->get('Admin/admin_donaciones/entregada/(:num)', 'Admin\AdminController::entregar_donacion/$1');
$routes->get('Admin/admin_donaciones/cancelada/(:num)', 'Admin\AdminController::cancelar_donacion/$1');
$routes->get('Admin/admin_donaciones/pendiente/(:num)', 'Admin\AdminController::pendiente_donacion/$1');
$routes->get('Admin/admin_donaciones/pendientes/(:num)', 'Admin\AdminController::pendientes_donacion/$1');
//admin solicitud
$routes->get('Admin/admin_solicitudes/solicitudes_aceptar/(:num)', 'Admin\AdminController::solicitudes_aceptar/$1');
$routes->get('Admin/admin_solicitudes/solicitudes_rechazar/(:num)', 'Admin\AdminController::solicitudes_rechazar/$1');
$routes->get('Admin/admin_solicitudes/solicitudes_pendiente/(:num)', 'Admin\AdminController::solicitudes_pendiente/$1');

// admin postulaciones
$routes->get('Admin/admin_postulacion/aceptar_postulacion/(:num)', 'Admin\AdminController::aceptar_postulacion/$1');
$routes->get('Admin/admin_postulacion/rechazar_postulacion/(:num)', 'Admin\AdminController::rechazar_postulacion/$1');
$routes->get('Admin/admin_postulacion/pendiente_postulacion/(:num)', 'Admin\AdminController::pendiente_postulacion/$1');

$routes->get('Admin/admin_participacion/aceptar_participacion/(:num)', 'Admin\AdminController::aceptar_participacion/$1');
$routes->get('Admin/admin_participacion/rechazar_participacion/(:num)', 'Admin\AdminController::rechazar_participacion/$1');
//----------------------------------------------------------
//----------------------VOLUNTARIO--------------------------
//----------------------------------------------------------
$routes->get('Voluntario/voluntario_dashboard', 'Voluntario\VoluntarioController::dashboard', ['as' => 'voluntario.dashboard']);
$routes->get('Voluntario/voluntario_postulaciones', 'Voluntario\VoluntarioController::voluntario_postulacion');
$routes->get('Voluntario/voluntario_postulacion/postular_recojo/(:num)', 'Voluntario\VoluntarioController::postular_recojo/$1');
$routes->get('Voluntario/voluntario_postulacion/postular_entrega/(:num)', 'Voluntario\VoluntarioController::postular_entrega/$1');
$routes->get('Voluntario/voluntario_postulacion/mandar_mensaje/(:num)', 'Voluntario\VoluntarioController::mandar_mensaje/$1');
$routes->post('Voluntario/voluntario_postulacion/mandar_mensaje/(:num)', 'Voluntario\VoluntarioController::mandar_mensaje/$1');
$routes->get('Voluntario/voluntario_mensajes', 'Voluntario\VoluntarioController::voluntario_mensajes');
$routes->post('Voluntario/responder_mensajes/(:num)', 'Voluntario\VoluntarioController::recResMensajes/$1');

$routes->post('Voluntario/coordinacion/mandar_mensaje/(:num)', 'Voluntario\VoluntarioController::mandar_coor_mensaje/$1');
$routes->post('Voluntario/coordinacion/mandar_mensaje/responsable(:num)', 'Voluntario\VoluntarioController::mandar_coor_mensaje_resp/$1');


$routes->post('Voluntario/voluntario_postulacion/postular_responsable/(:num)', 'Voluntario\VoluntarioController::postularResponsable/$1');
$routes->get('Voluntario/voluntario_coordinacion', 'Voluntario\VoluntarioController::voluntario_coordinacion');

$routes->get('Voluntario/donacion/Rechazar/(:num)', 'Voluntario\VoluntarioController::rechazar_postulacion/$1');
$routes->get('Voluntario/donacion/Aceptar/(:num)', 'Voluntario\VoluntarioController::aceptar_postulacion/$1');

$routes->post('Voluntario/confirmar_entrega/(:num)', 'Voluntario\VoluntarioController::confirmar_entrega/$1');
$routes->get('Voluntario/confirmar_recojo/(:num)', 'Voluntario\VoluntarioController::confirmar_recojo/$1');

$routes->get('Voluntario/voluntario_participacion', 'Voluntario\VoluntarioController::mostrar_participaciones');

//----------------------------------------------------------
//----------------------DONANTE--------------------------
//----------------------------------------------------------

$routes->get('Donante/donante_dashboard', 'Donante\DonanteController::dashboard', ['as' => 'donante.dashboard']);
$routes->get('Donante/donante_donaciones', 'Donante\DonanteController::donDonaciones');
$routes->get('Donante/donante_solicitudes', 'Donante\DonanteController::donSolicitudes');
$routes->get('Donante/donante_mensajes', 'Donante\DonanteController::donMensajes');
$routes->post('Donante/responder_mensajes/(:num)', 'Donante\DonanteController::recResMensajes/$1');
$routes->get('Donante/donante_perfil', 'Donante\DonanteController::donPerfil');


$routes->get('Donante/donante_solicitudes/donarSol/(:num)', 'Donante\DonanteController::donarSol/$1');
$routes->post('Forms/_form_agregar/addDon/(:num)', 'Donante\DonanteController::addDon/$1');
$routes->post('Forms/_form_agregar/continuar/(:num)', 'Donante\DonanteController::addproal/$1');
$routes->get('Forms/_form_agregar/continuar/(:num)', 'Donante\DonanteController::addproal/$1');
$routes->post('Forms/_form_agregar/addAlimento/(:num)', 'Donante\DonanteController::addAlimento/$1');
$routes->post('Forms/_form_agregar/addProducto/(:num)', 'Donante\DonanteController::addProducto/$1');

//----------------------------------------------------------
//----------------------RECEPTOR--------------------------
//----------------------------------------------------------
$routes->get('Receptor/receptor_dashboard', 'Receptor\ReceptorController::dashboard', ['as' => 'receptor.dashboard']);
$routes->get('Receptor/receptor_solicitudes', 'Receptor\ReceptorController::recSolicitudes');
$routes->get('Receptor/receptor_donaciones', 'Receptor\ReceptorController::recDonaciones');
$routes->get('Receptor/receptor_mensajes', 'Receptor\ReceptorController::recMensajes');
$routes->post('Receptor/responder_mensajes/(:num)', 'Receptor\ReceptorController::recResMensajes/$1');
$routes->get('Receptor/receptor_perfil', 'Receptor\ReceptorController::recPerfil');

$routes->get('Forms/_form_solicitud', 'Receptor\ReceptorController::formSolicitud');
$routes->post('Forms/_form_solicitud/guardar_solicitud', 'Receptor\ReceptorController::guardar_solicitud');