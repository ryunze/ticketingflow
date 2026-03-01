<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('login', 'Auth::login', ['as' => 'auth.login']);
$routes->post('auth/login', 'Auth::handle_login');

$routes->group('admin', ['filter' => 'role:1'], static function($route) {
    $route->get('dashboard', 'Admin\Dashboard::index', ['as' => 'admin.dashboard']);
});

$routes->group('manager', ['filter' => 'role:2'], static function($route) {
    $route->get('dashboard', 'Manager\Dashboard::index', ['as' => 'manager.dashboard']);
});

$routes->group('staff', ['filter' => 'role:3'], static function($route) {
    $route->get('dashboard', 'Staff\Dashboard::index', ['as' => 'staff.dashboard']);
});

$routes->group('support', ['filter' => 'role:4'], static function($route) {
    $route->get('dashboard', 'Support\Dashboard::index', ['as' => 'support.dashboard']);
});