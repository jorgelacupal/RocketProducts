<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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

// Registro Usuario
$routes->get('usuario/registro_usuario', 'Usuario::registro_usuario');
$routes->post('usuario/registro_usuario_hecho', 'Usuario::registro_usuario_hecho');
// Registro Empresa
$routes->get('usuario/registro_empresa', 'Usuario::registro_empresa');
$routes->post('usuario/registro_empresa_hecho', 'Usuario::registro_empresa_hecho');
// Perfil Empresa
$routes->get('usuario/perfil_empresa', 'Usuario::perfil_empresa');
// Perfil Usuario
$routes->get('usuario/perfil_usuario', 'Usuario::perfil_usuario');
// Modificar Perfil Usuario
$routes->get('usuario/modificar_perfil_usuario', 'Usuario::modificar_perfil_usuario');
$routes->post('usuario/modificar_perfil_usuario_hecho', 'Usuario::modificar_perfil_usuario_hecho');
// Modificar Perfil Empresa
$routes->get('usuario/modificar_perfil_empresa', 'Usuario::modificar_perfil_empresa');
$routes->post('usuario/modificar_perfil_empresa_hecho', 'Usuario::modificar_perfil_empresa_hecho');
// Modificar/añadir direccion Usuario
$routes->get('usuario/modificar_direccion', 'Usuario::modificar_direccion');
$routes->post('usuario/modificar_direccion_hecho', 'Usuario::modificar_direccion_hecho');
// Usuario Iniciar Sesion
$routes->get('usuario/iniciar_sesion', 'Usuario::iniciar_sesion');
$routes->post('usuario/iniciar_sesion_hecho', 'Usuario::iniciar_sesion_hecho');
// Dar de baja
$routes->get('usuario/dar_baja_usuario', 'Usuario::dar_baja_usuario');
$routes->post('usuario/dar_baja_usuario_hecho', 'Usuario::dar_baja_usuario_hecho');
// Cerrar sesion
$routes->get('usuario/cerrar_sesion', 'Usuario::cerrar_sesion');
// Gestionar Productos
$routes->get('usuario/gestionar_productos', 'Producto::gestionar_productos');
// Añadir productos
$routes->get('usuario/anadir_producto', 'Producto::anadir_producto');
$routes->post('usuario/anadir_producto_hecho', 'Producto::anadir_producto_hecho');
//Modificar Producto
$routes->get('usuario/modificar_producto(:num)', 'Producto::modificar_producto/$1');
$routes->post('usuario/modificar_producto_hecho', 'Producto::modificar_producto_hecho');
// Mostrar producto
$routes->get('mostrar_producto(:num)', 'Producto::mostrar_producto/$1');
// Eliminar Producto
$routes->get('usuario/eliminar_producto(:num)', 'Producto::eliminar_producto/$1');
// Comprar Producto/añadir al carrito
$routes->get('usuario/comprar_producto(:num)', 'Producto::comprar_producto/$1');
// Ver carrito
$routes->get('ver_carrito', 'Producto::ver_carrito');
// Pagar
$routes->post('pagar', 'Pedido::pagar');
// Añadir comentario
$routes->post('producto/anadir_comentario', 'Producto::anadir_comentario');
// Pedidos
$routes->get('usuario/pedidos', 'Pedido::pedidos');

$routes->get('index', 'Producto::index');



// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Producto::index');

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
