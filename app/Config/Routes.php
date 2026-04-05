<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('login', 'Auth::login', ['as' => 'auth.login']);
$routes->post('auth/login', 'Auth::handle_login');
$routes->get('logout', static function() {
    session()->destroy();
    return redirect()->route('auth.login');
}, ['as' => 'auth.logout']);

$routes->group('admin', ['filter' => 'role:1'], static function($route) {
    $route->get('dashboard', 'Admin\Dashboard::index', ['as' => 'admin.dashboard']);
});

$routes->group('manager', ['filter' => 'role:2'], static function($route) {
    $route->get('dashboard', 'Manager\Dashboard::index', ['as' => 'manager.dashboard']);
});

$routes->group('staff', ['filter' => 'role:3'], static function($route) {
    $route->get('dashboard', 'Staff\Task::index', ['as' => 'staff.dashboard']);
    $route->get('tasks', 'Staff\Task::index', ['as' => 'staff.tasks']);
    $route->get('task/create', 'Staff\Task::create', ['as' => 'staff.task.create']);
    $route->post('task/store', 'Staff\Task::store', ['as' => 'staff.task.store']);

});

$routes->group('support', ['filter' => 'role:4'], static function($route) {
    $route->get('dashboard', 'Support\Dashboard::index', ['as' => 'support.dashboard']);
    $route->get('tasks', 'Support\Task::index', ['as' => 'support.tasks']);
    $route->post('task/update-status/(:num)', 'Support\Task::updateStatus/$1', ['as' => 'staff.task.update-status']);
});

$routes->group('api/v1/tasks', ['filter' => 'role:3'], static function($route) {
    $route->delete('/', 'Api\Task::cancel');
});