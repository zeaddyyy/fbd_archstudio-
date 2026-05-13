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
| ADMIN - BASIC AUTH
|--------------------------------------------------------------------------
*/
$routes->get('/admin/login', 'Admin::login');
$routes->post('/admin/auth', 'Admin::auth');
$routes->get('/admin/logout', 'Admin::logout');
$routes->get('/admin', 'Admin::index');

/*
|--------------------------------------------------------------------------
| ADMIN - FORGOT PASSWORD & OTP SYSTEM (ADD THESE)
|--------------------------------------------------------------------------
*/
$routes->get('/admin/forgot-password', 'Admin::forgotPassword');
$routes->post('/admin/send-otp', 'Admin::sendOTP');
$routes->get('/admin/verify-otp', 'Admin::verifyOTPForm');
$routes->post('/admin/verify-otp', 'Admin::verifyOTP');
$routes->get('/admin/reset-password', 'Admin::resetPasswordForm');
$routes->post('/admin/update-password', 'Admin::updatePassword');
$routes->get('/admin/profile', 'Admin::profile');
$routes->post('/admin/change-password', 'Admin::changePassword');

/*
|--------------------------------------------------------------------------
| ADMIN - CRUD OPERATIONS
|--------------------------------------------------------------------------
*/
$routes->get('/admin/create', 'Admin::create');
$routes->get('/admin/edit/(:num)', 'Admin::edit/$1');
$routes->post('/admin/update/(:num)', 'Admin::update/$1');
$routes->post('/admin/store', 'Admin::store');
$routes->get('/admin/delete/(:num)', 'Admin::delete/$1');

/*
|--------------------------------------------------------------------------
| ADMIN - LOGO MANAGEMENT
|--------------------------------------------------------------------------
*/
$routes->get('admin/logo', 'Admin::logo');
$routes->post('admin/logo/update', 'Admin::updateLogo');