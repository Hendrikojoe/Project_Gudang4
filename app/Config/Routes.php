<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
<<<<<<< HEAD
/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */
$routes->setDefaultController('Register');
$routes->get('/', 'Register::index', ['filter' => 'guestFilter']);
=======

// Halaman Utama
$routes->get('/', 'Home::index');
$routes->get('/index', 'Home::index');

// Autentikasi
>>>>>>> d761bdf598ef432ecbd169bd5a5108d8b34f37a9
$routes->get('/register', 'Register::index', ['filter' => 'guestFilter']);
$routes->post('/register', 'Register::register', ['filter' => 'guestFilter']);
 
$routes->get('/login', 'Login::index', ['filter' => 'guestFilter']);
$routes->post('/login', 'Login::authenticate', ['filter' => 'guestFilter']);
 
$routes->get('/logout', 'Login::logout', ['filter' => 'authFilter']);
<<<<<<< HEAD
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'authFilter']);
=======
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'authFilter']);

// API atau lainnya
$routes->get('/test', 'Home::test');
>>>>>>> d761bdf598ef432ecbd169bd5a5108d8b34f37a9
