<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

$routes = Services::routes();

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

$routes->get('/', 'Home::index');

$routes->get('dashboard', 'Dashboard::index');
$routes->get('admin/dashboard', 'AdminDashboard::index');

$routes->get('barang', 'BarangController::index');
$routes->get('barang/create', 'BarangController::create');
$routes->post('barang/store', 'BarangController::store');
$routes->get('barang/edit/(:num)', 'BarangController::edit/$1');
$routes->post('barang/update/(:num)', 'BarangController::update/$1');
$routes->get('barang/delete/(:num)', 'BarangController::delete/$1');

$routes->get('transaksi', 'TransaksiController::index');
$routes->get('transaksi/create', 'TransaksiController::create');
$routes->get('transaksi/masuk', 'TransaksiController::masuk');
$routes->get('transaksi/keluar', 'TransaksiController::keluar');
$routes->post('transaksi/store', 'TransaksiController::store');
$routes->get('transaksi/edit/(:num)', 'TransaksiController::edit/$1');
$routes->post('transaksi/update/(:num)', 'TransaksiController::update/$1');
$routes->get('transaksi/delete/(:num)', 'TransaksiController::delete/$1');

$routes->get('laporan', 'LaporanController::index');
$routes->get('operator', 'UserController::index');

$routes->get('login', 'Login::index');
$routes->post('login/authenticate', 'Login::authenticate');
$routes->get('logout', 'Login::logout');

$routes->get('register', 'Register::index');
$routes->post('register/save', 'Register::register');