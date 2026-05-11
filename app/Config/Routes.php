<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

$routes->get('/project/(:num)', 'Projects::view/$1');

$routes->get('/contact', 'Contact::index');

$routes->post('/contact/send', 'Contact::send');

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

$routes->get('/admin', 'Admin::index');

$routes->get('/admin/create', 'Admin::create');

$routes->post('/admin/store', 'Admin::store');

$routes->get('/admin/delete/(:num)', 'Admin::delete/$1');