<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Halaman utama
$routes->get('/', 'Register::index', ['filter' => 'guestFilter']);
$routes->get('/index', 'Home::index');

// Autentikasi
$routes->get('/register', 'Register::index', ['filter' => 'guestFilter']);
$routes->post('/register', 'Register::register', ['filter' => 'guestFilter']);

$routes->get('/login', 'Login::index', ['filter' => 'guestFilter']);
$routes->post('/login', 'Login::authenticate', ['filter' => 'guestFilter']);

$routes->get('/logout', 'Login::logout', ['filter' => 'authFilter']);

// Dashboard
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'authFilter']);

// Testing
$routes->get('/test', 'Home::test');