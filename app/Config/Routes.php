<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

$routes = Services::routes();

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

// Dashboard Routes
$routes->get('dashboard', 'Dashboard::index');
$routes->get('admin/dashboard', 'Dashboard::index');
$routes->get('admin', 'Dashboard::index');

// Default route
$routes->get('/', 'Home::index');

// Anda bisa tambahkan route lain sesuai kebutuhan
$routes->get('barang', 'BarangController::index');
$routes->get('transaksi', 'TransaksiController::index');
$routes->get('operator', 'UserController::index');

// Auth Routes
$routes->get('login', 'Login::index');
$routes->post('login/authenticate', 'Login::authenticate');
$routes->get('logout', 'Login::logout');

$routes->get('register', 'Register::index');
$routes->post('register/save', 'Register::register');
