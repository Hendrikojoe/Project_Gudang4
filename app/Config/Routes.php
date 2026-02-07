<?php

namespace Config;

$routes = Services::routes();

if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

// Default
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

// === Home / Landing Page ===
$routes->get('/', 'Home::index');
$routes->get('test', 'Home::test');

// === Auth ===
// Login
$routes->get('login', 'Login::index');
$routes->post('login', 'Login::authenticate');
$routes->get('logout', 'Login::logout');

// Register
$routes->get('register', 'Register::index');
$routes->post('register', 'Register::register');

// === Dashboard Admin ===
$routes->get('admin/dashboard', 'AdminDashboard::index');

// === CRUD Barang ===
$routes->group('barang', function($routes) {
    $routes->get('', 'BarangController::index');
    $routes->get('create', 'BarangController::create');
    $routes->post('store', 'BarangController::store');
    $routes->get('edit/(:num)', 'BarangController::edit/$1');
    $routes->post('update/(:num)', 'BarangController::update/$1');
    $routes->get('delete/(:num)', 'BarangController::delete/$1');
});

// === CRUD Supplier ===
$routes->group('supplier', function($routes) {
    $routes->get('', 'SupplierController::index');
    $routes->get('create', 'SupplierController::create');
    $routes->post('store', 'SupplierController::store');
    $routes->get('edit/(:num)', 'SupplierController::edit/$1');
    $routes->post('update/(:num)', 'SupplierController::update/$1');
    $routes->get('delete/(:num)', 'SupplierController::delete/$1');
});

// === CRUD Transaksi ===
$routes->group('transaksi', function($routes) {
    $routes->get('', 'TransaksiController::index');
    $routes->get('create', 'TransaksiController::create');
    $routes->post('store', 'TransaksiController::store');
    $routes->get('edit/(:num)', 'TransaksiController::edit/$1');
    $routes->post('update/(:num)', 'TransaksiController::update/$1');
    $routes->get('delete/(:num)', 'TransaksiController::delete/$1');
});

// === CRUD User / Pegawai ===
$routes->group('user', function($routes) {
    $routes->get('', 'UserController::index');
    $routes->get('create', 'UserController::create');
    $routes->post('store', 'UserController::store');
    $routes->get('edit/(:num)', 'UserController::edit/$1');
    $routes->post('update/(:num)', 'UserController::update/$1');
    $routes->get('delete/(:num)', 'UserController::delete/$1');
});