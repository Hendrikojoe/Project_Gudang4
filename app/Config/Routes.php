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

// Barang Masuk
$routes->get('barangmasuk', 'BarangMasuk::index');
$routes->get('barangmasuk/create', 'BarangMasuk::create');
$routes->post('barangmasuk/store', 'BarangMasuk::store');
$routes->get('barangmasuk/delete/(:num)', 'BarangMasuk::delete/$1');

// Barang Keluar
$routes->get('barangkeluar', 'BarangKeluar::index');
$routes->get('barangkeluar/create', 'BarangKeluar::create');
$routes->post('barangkeluar/store', 'BarangKeluar::store');
$routes->get('barangkeluar/delete/(:num)', 'BarangKeluar::delete/$1');
