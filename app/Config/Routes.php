
<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

// Administración de usuarios: solo administradores
$routes->group('usuarios', ['filter' => 'auth:administrador'], function($routes) {

    $routes->get('/', 'Usuario::index');

    $routes->get('crear', 'Usuario::crear');
    $routes->post('guardar', 'Usuario::guardar');

    $routes->get('editar/(:num)', 'Usuario::editar/$1');
    $routes->post('actualizar/(:num)', 'Usuario::actualizar/$1');

    $routes->post('eliminar/(:num)', 'Usuario::eliminar/$1');
});

// Galería: usuarios autenticados
$routes->group('imagenes', ['filter' => 'auth'], function($routes) {

    $routes->get('/', 'Imagen::index');
    $routes->post('subir', 'Imagen::subir');
    $routes->get('ver/(:num)', 'Imagen::ver/$1');
    $routes->post('eliminar/(:num)', 'Imagen::eliminar/$1');

});

// Autenticación y registro público
$routes->get('login', 'Auth::login');
$routes->post('autenticar', 'Auth::autenticar');

$routes->get('registro', 'Auth::registro');
$routes->post('registrar', 'Auth::registrar');

$routes->get('logout', 'Auth::logout');
