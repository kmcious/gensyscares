<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('announcement', 'Pages::announcement');
$routes->get('about', 'Pages::about');
$routes->get('contact', 'Pages::contact');

//register

$routes->post('/auth/register', 'Auth::register');

//login
$routes->post('auth/login', 'Auth::login');


//dashboard routes if user or admin
$routes->get('/adminSide/dashboard', 'DashboardController::adminDashboard');
$routes->get('/userSide/dashboard', 'DashboardController::userDashboard');

//logout
$routes->get('/auth/logout', 'Auth::logout');


//announcement routes display
$routes->get('/pages/announcements', 'AnnouncementController::index');

//admin announcement routes
$routes->get('admin/announcements', 'AdminAnnouncement::index');
$routes->post('admin/announcements/store', 'AdminAnnouncement::store');


$routes->get('admin/announcements/delete/(:num)', 'AdminAnnouncement::delete/$1');