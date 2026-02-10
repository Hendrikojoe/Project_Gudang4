<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;
use Config\Services;

$routes = Services::routes();

// Load system routing first (optional)
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
|----------------------------------------------------------------------
| Router Setup
|----------------------------------------------------------------------
*/
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true); // optional, safer to leave false in production

/*
|----------------------------------------------------------------------
| Default Route
|----------------------------------------------------------------------
*/
$routes->get('/', 'Home::index');

/*
|----------------------------------------------------------------------
| Dashboard
|----------------------------------------------------------------------
*/
$routes->get('dashboard', 'Dashboard::index');
$routes->get('admin', 'Dashboard::index');
$routes->get('admin/dashboard', 'Dashboard::index');

/*
|----------------------------------------------------------------------
| Auth
|----------------------------------------------------------------------
*/
$routes->get('login', 'Login::index');
$routes->post('login/authenticate', 'Login::authenticate');
$routes->get('logout', 'Login::logout');

$routes->get('register', 'Register::index');
$routes->post('register/save', 'Register::register');

/*
|----------------------------------------------------------------------
| Master Data
|----------------------------------------------------------------------
*/

// Barang
$routes->get('barang', 'BarangController::index');
$routes->get('barang/create', 'BarangController::create');
$routes->post('barang/store', 'BarangController::store');
$routes->get('barang/edit/(:num)', 'BarangController::edit/$1');
$routes->post('barang/update/(:num)', 'BarangController::update/$1');
$routes->get('barang/delete/(:num)', 'BarangController::delete/$1');

// User / Operator
$routes->get('user', 'UserController::index');
$routes->get('user/create', 'UserController::create');
$routes->post('user/store', 'UserController::store');
$routes->get('user/edit/(:num)', 'UserController::edit/$1');
$routes->post('user/update/(:num)', 'UserController::update/$1');
$routes->get('user/delete/(:num)', 'UserController::delete/$1');

/*
|----------------------------------------------------------------------
| Transaksi (Masuk & Keluar)
|----------------------------------------------------------------------
*/
$routes->group('transaksi', function ($routes) {

    // Barang Masuk
    $routes->get('masuk', 'BarangMasuk::index');
    $routes->get('masuk/create', 'BarangMasuk::create');
    $routes->post('masuk/store', 'BarangMasuk::store');
    $routes->get('masuk/delete/(:num)', 'BarangMasuk::delete/$1');

    // Barang Keluar
    $routes->get('keluar', 'BarangKeluar::index');
    $routes->get('keluar/create', 'BarangKeluar::create');
    $routes->post('keluar/store', 'BarangKeluar::store');
    $routes->get('keluar/delete/(:num)', 'BarangKeluar::delete/$1');
});

// Laporan
$routes->get('laporan', 'LaporanController::index');
$routes->get('laporan/create', 'LaporanController::create');
$routes->post('laporan/store', 'LaporanController::store');
$routes->get('laporan/edit/(:num)', 'LaporanController::edit/$1');
$routes->post('laporan/update/(:num)', 'LaporanController::update/$1');
$routes->get('laporan/delete/(:num)', 'LaporanController::delete/$1');

/*
|----------------------------------------------------------------------
| Additional Routing
|----------------------------------------------------------------------
| Load environment-specific routes if exists
*/
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}