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

<<<<<<< HEAD
// ====== HOME / AUTH ======
=======
// ================= HOME =================
>>>>>>> 57e7575adf4790bc752e34b3bcca0e05c6870d53
$routes->get('/', 'Home::index');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('admin', 'Dashboard::index');
$routes->get('admin/dashboard', 'Dashboard::index');

<<<<<<< HEAD
$routes->get('dashboard', 'Dashboard::index');
$routes->get('admin', 'Dashboard::index');
$routes->get('admin/dashboard', 'Dashboard::index');

=======
// ================= AUTH =================
>>>>>>> 57e7575adf4790bc752e34b3bcca0e05c6870d53
$routes->get('login', 'Login::index');
$routes->post('login/authenticate', 'Login::authenticate');
$routes->get('logout', 'Login::logout');

$routes->get('register', 'Register::index');
$routes->post('register/save', 'Register::register');

<<<<<<< HEAD
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

=======
// ================= DATA BARANG =================
$routes->get('barang', 'BarangController::index');
$routes->get('barang/create', 'BarangController::create');
$routes->post('barang/store', 'BarangController::store');

$routes->get('barang/edit/(:num)', 'BarangController::edit/$1');
$routes->post('barang/update/(:num)', 'BarangController::update/$1');
$routes->get('barang/delete/(:num)', 'BarangController::delete/$1');
// FORM HALAMAN
$routes->get('transaksi/masuk/(:num)', 'BarangController::formMasuk/$1');
$routes->get('transaksi/keluar/(:num)', 'BarangController::formKeluar/$1');

// PROSES SIMPAN
$routes->post('transaksi/masuk/(:num)', 'BarangController::masuk/$1');
$routes->post('transaksi/keluar/(:num)', 'BarangController::keluar/$1');

// ================= OPERATOR =================
$routes->get('operator', 'UserController::index');

// ================= LAPORAN =================
>>>>>>> 57e7575adf4790bc752e34b3bcca0e05c6870d53
$routes->get('laporan', 'LaporanController::index');
$routes->get('laporan/export/pdf', 'LaporanController::exportPdf');
