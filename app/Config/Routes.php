<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Public Hospital Routes
$routes->get('hospitals', 'Hospital::index');
$routes->get('hospitals/detail/(:num)', 'Hospital::detail/$1');

// Auth Routes
$routes->get('auth/login', 'Auth::login');
$routes->post('auth/process', 'Auth::process');
$routes->get('auth/logout', 'Auth::logout');

// Admin Routes
$routes->group('admin', function($routes) {
    $routes->get('/', 'Admin::index');
    $routes->get('create', 'Admin::create');
    $routes->post('store', 'Admin::store');
    $routes->get('edit/(:num)', 'Admin::edit/$1');
    $routes->post('update/(:num)', 'Admin::update/$1');
    $routes->get('delete/(:num)', 'Admin::delete/$1');
});
