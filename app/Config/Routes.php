<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->get('/logout', 'Login::logout');
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'accesosistema']);
$routes->get('/netflix', 'Netflix::index', ['filter' => 'accesosistema']);

$routes->group('api/v1', ['namespace' => 'App\Controllers\API\v1'], static function ($routes) {
    $routes->post('fetchLogin', 'FetchLogin::index');
});

$routes->group('sistema', ['namespace' => 'App\Controllers\sistema', 'filter' => 'accesosistema'], static function ($routes){
    $routes->get('descargar/(:any)', 'Descargar::index/$1');
    $routes->get('ver', 'Ver::index');
});

$routes->group('archivos', ['namespace' => 'App\Controllers\archivos', 'filter' => 'accesosistema'], static function ($routes){
    $routes->post('subirArchivosNetflix', 'subirArchivosNetflix::index');
    $routes->post('subirArchivosPrime', 'subirArchivosPrime::index');
    $routes->post('subirArchivosStarplus', 'subirArchivosStarplus::index');
});

