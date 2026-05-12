<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

/*
|--------------------------------------------------------------------------
| PROJECTS
|--------------------------------------------------------------------------
*/

$routes->get('/projects', 'Projects::index');

$routes->get('/project/(:num)', 'Projects::view/$1');

/*
|--------------------------------------------------------------------------
| CONTACT
|--------------------------------------------------------------------------
*/

$routes->get('/contact', 'Contact::index');

$routes->post('/contact/send', 'Contact::send');

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

$routes->get('/admin', 'Admin::index');

$routes->get('/admin/create', 'Admin::create');

$routes->get('/admin/edit/(:num)', 'Admin::edit/$1');

$routes->post('/admin/update/(:num)', 'Admin::update/$1');

$routes->post('/admin/store', 'Admin::store');

$routes->get('/admin/delete/(:num)', 'Admin::delete/$1');

/*
|--------------------------------------------------------------------------
| LOGO
|--------------------------------------------------------------------------
*/

$routes->get('admin/logo', 'Admin::logo');

$routes->post('admin/logo/update', 'Admin::updateLogo');