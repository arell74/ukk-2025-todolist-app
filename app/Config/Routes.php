<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::login');
$routes->get('login', 'Auth::login');
$routes->post('auth/loginProcess', 'Auth::loginProcess');
$routes->get('register', 'Auth::register');
$routes->post('auth/registerProcess', 'Auth::registerProcess');
$routes->get('logout', 'Auth::logout');

$routes->get('home', 'Task::home', ['filter' => 'userFilter']);
$routes->get('task', 'Task::home', ['filter' => 'userFilter']);
$routes->post('task/insert', 'Task::insert', ['filter' => 'userFilter']);
$routes->get('task/edit/(:num)', 'Task::edit/$1', ['filter' => 'userFilter']);
$routes->post('task/update/(:num)', 'Task::update/$1', ['filter' => 'userFilter']);
$routes->get('task/delete/(:num)', 'Task::delete/$1', ['filter' => 'userFilter']);
$routes->get('task/complete/(:num)', 'Task::complete/$1', ['filter' => 'userFilter']);
$routes->get('task/kategori/(:segment)', 'Task::kategori/$1', ['filter' => 'userFilter']);
$routes->get('task/calendar', 'Task::calendar', ['filter' => 'userFilter']);
$routes->get('task/events', 'Task::events', ['filter' => 'userFilter']);

$routes->get('user/profile', 'User::profile', ['filter' => 'userFilter']);
$routes->post('user/update', 'User::updateProfile', ['filter' => 'userFilter']);




