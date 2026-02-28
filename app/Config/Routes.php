<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('login', 'Auth::login', ['as' => 'auth.login']);
$routes->post('auth/login', 'Auth::handle_login');

$routes->get('admin/dashboard', 'Admin\Dashboard::index', ['as' => 'admin.dashboard']);
$routes->get('manager/dashboard', 'Manager\Dashboard::index', ['as' => 'manager.dashboard']);
$routes->get('staff/dashboard', 'Staff\Dashboard::index', ['as' => 'staff.dashboard']);
$routes->get('support/dashboard', 'Support\Dashboard::index', ['as' => 'support.dashboard']);