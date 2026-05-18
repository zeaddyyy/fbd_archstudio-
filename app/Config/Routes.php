<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

$routes->get(
    '/',
    'Home::index'
);

/*
|--------------------------------------------------------------------------
| ABOUT
|--------------------------------------------------------------------------
*/

$routes->get('/about', 'Home::about');

/*
|--------------------------------------------------------------------------
| ACHIEVEMENTS
|--------------------------------------------------------------------------
*/

$routes->get('/achievements', 'Home::achievements');

/*
|--------------------------------------------------------------------------
| PROJECTS
|--------------------------------------------------------------------------
*/
$routes->get('/about', 'Home::about');



$routes->get('/achievements', 'Home::achievements');
/*
|--------------------------------------------------------------------------
| ABOUT PAGE
|--------------------------------------------------------------------------
*/

$routes->get(
    '/about',
    'Home::about'
);

/*
|--------------------------------------------------------------------------
| ACHIEVEMENTS PAGE
|--------------------------------------------------------------------------
*/

$routes->get(
    '/achievements',
    'Home::achievements'
);

$routes->get(
    '/projects',
    'Projects::index'
);

$routes->get(
    '/project/(:num)',
    'Projects::view/$1'
);

/*
|--------------------------------------------------------------------------
| CONTACT
|--------------------------------------------------------------------------
*/

$routes->get(
    '/contact',
    'Contact::index'
);

$routes->post(
    '/contact/send',
    'Contact::send'
);

/*
|--------------------------------------------------------------------------
| ADMIN - BASIC AUTH
|--------------------------------------------------------------------------
*/

$routes->get(
    '/admin/login',
    'Admin::login'
);

$routes->post(
    '/admin/auth',
    'Admin::auth'
);

$routes->get(
    '/admin/logout',
    'Admin::logout'
);

$routes->get(
    '/admin',
    'Admin::index'
);

/*
|--------------------------------------------------------------------------
| ADMIN - HOMEPAGE PROJECTS CMS
|--------------------------------------------------------------------------
*/

$routes->get(
    '/admin/home-projects',
    'Admin::homeProjects'
);

$routes->get(
    '/admin/home-projects/create',
    'Admin::createHomeProject'
);

$routes->post(
    '/admin/home-projects/store',
    'Admin::storeHomeProject'
);

$routes->get(
    '/admin/home-projects/delete/(:num)',
    'Admin::deleteHomeProject/$1'
);

/*
|--------------------------------------------------------------------------
| ADMIN - FORGOT PASSWORD & OTP SYSTEM
|--------------------------------------------------------------------------
*/

$routes->get(
    '/admin/forgot-password',
    'Admin::forgotPassword'
);

$routes->post(
    '/admin/send-otp',
    'Admin::sendOTP'
);

$routes->get(
    '/admin/verify-otp',
    'Admin::verifyOTPForm'
);

$routes->post(
    '/admin/verify-otp',
    'Admin::verifyOTP'
);

$routes->get(
    '/admin/reset-password',
    'Admin::resetPasswordForm'
);

$routes->post(
    '/admin/update-password',
    'Admin::updatePassword'
);

$routes->get(
    '/admin/profile',
    'Admin::profile'
);

$routes->post(
    '/admin/change-password',
    'Admin::changePassword'
);

/*
|--------------------------------------------------------------------------
| ADMIN - NORMAL PROJECT CRUD
|--------------------------------------------------------------------------
*/

$routes->get(
    '/admin/create',
    'Admin::create'
);

$routes->get(
    '/admin/edit/(:num)',
    'Admin::edit/$1'
);

$routes->post(
    '/admin/update/(:num)',
    'Admin::update/$1'
);

$routes->post(
    '/admin/store',
    'Admin::store'
);

$routes->get(
    '/admin/delete/(:num)',
    'Admin::delete/$1'
);

/*
|--------------------------------------------------------------------------
| ADMIN - LOGO MANAGEMENT
|--------------------------------------------------------------------------
*/

$routes->get(
    'admin/logo',
    'Admin::logo'
);

$routes->post(
    'admin/logo/update',
    'Admin::updateLogo'
);
