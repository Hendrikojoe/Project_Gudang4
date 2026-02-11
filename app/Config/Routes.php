<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;
use Config\Services;

$routes = Services::routes();

// Default settings
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

// ====== HOME / AUTH ======
$routes->get('/', 'Home::index');

$routes->get('dashboard', 'Dashboard::index');
$routes->get('admin', 'Dashboard::index');
$routes->get('admin/dashboard', 'Dashboard::index');

$routes->get('login', 'Login::index');
$routes->post('login/authenticate', 'Login::authenticate');
$routes->get('logout', 'Login::logout');

$routes->get('register', 'Register::index');
$routes->post('register/save', 'Register::register');

// ====== DATA BARANG ======
$routes->get('barang', 'BarangController::index');
$routes->get('barang/create', 'BarangController::create');
$routes->post('barang/store', 'BarangController::store');
$routes->get('barang/edit/(:num)', 'BarangController::edit/$1');
$routes->post('barang/update/(:num)', 'BarangController::update/$1');
$routes->get('barang/delete/(:num)', 'BarangController::delete/$1');

// 🆕 Barang Masuk & Keluar (digabung ke BarangController)
$routes->post('barang/masuk/(:num)', 'BarangController::masuk/$1');
$routes->post('barang/keluar/(:num)', 'BarangController::keluar/$1');

// ====== OPERATOR & LAPORAN ======
$routes->get('operator', 'UserController::index');

$routes->get('laporan', 'LaporanController::index');
$routes->get('laporan/export/pdf', 'LaporanController::exportPdf');
