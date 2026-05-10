<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//user
$routes->get('/', 'Home::index');
$routes->get('/', 'Home::index');
$routes->get('/project/(:num)', 'Projects::view/$1');



//admin
$routes->get('/admin', 'Admin::index');

$routes->get('/admin/create', 'Admin::create');

$routes->post('/admin/store', 'Admin::store');