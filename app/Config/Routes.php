<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;
use Config\Services;

$routes = Services::routes();

// ================= DEFAULT SETTINGS =================
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

// ================= DASHBOARD =================
$routes->get('/', 'Home::index');

$routes->get('dashboard', function () {
    if (session()->get('role') == 'admin') {
        return redirect()->to('/admin/dashboard');
    }
    return redirect()->to('/user/dashboard');
});

$routes->get('admin', 'AdminDashboard::index');
$routes->get('admin/dashboard', 'AdminDashboard::index');

$routes->get('user', 'UserDashboard::index');
$routes->get('user/dashboard', 'UserDashboard::index');

// ================= USER ROUTES =================
$routes->get('user/barang', 'BarangController::index');
$routes->get('user/barang/masuk', 'BarangMasukController::index');
$routes->get('user/barang/keluar', 'BarangKeluarController::index');
$routes->get('user/laporan', 'LaporanController::index');
$routes->get('user/profile', 'ProfileController::index');

// ================= AUTH =================
$routes->get('login', 'Login::index');
$routes->post('login/authenticate', 'Login::authenticate');  
$routes->get('logout', 'Login::logout');

$routes->get('register', 'Register::index');
$routes->post('register/save', 'Register::register');

// ================= DATA BARANG =================
$routes->get('barang', 'BarangController::index');
$routes->get('barang/index', 'BarangController::index');
$routes->get('barang/kategori/(:num)', 'BarangController::kategori/$1');
$routes->get('barang/create', 'BarangController::create');
$routes->post('barang/store', 'BarangController::store');
$routes->get('barang/edit/(:num)', 'BarangController::edit/$1');
$routes->put('barang/update/(:num)', 'BarangController::update/$1');
$routes->get('barang/delete/(:num)', 'BarangController::delete/$1');
$routes->get('barang/detail/(:num)', 'BarangController::detail/$1');

// ================= MAINTENANCE BARANG =================
$routes->get('barang/maintenance/(:num)', 'BarangController::maintenance/$1');
$routes->post('barang/updateMaintenance/(:num)', 'BarangController::updateMaintenance/$1');

// Barang masuk/keluar routes
$routes->post('barang/masuk/(:num)', 'BarangController::masuk/$1');
$routes->post('barang/keluar/(:num)', 'BarangController::keluar/$1');

// ================= KATEGORI BARANG =================
$routes->get('kategori', 'KategoriController::index');
$routes->get('kategori/create', 'KategoriController::create');
$routes->post('kategori/store', 'KategoriController::store');
$routes->get('kategori/edit/(:num)', 'KategoriController::edit/$1');
$routes->post('kategori/update/(:num)', 'KategoriController::update/$1');
$routes->get('kategori/delete/(:num)', 'KategoriController::delete/$1');

// ================= SUB-ITEM / VARIAN =================
$routes->get('barang/sub-item/(:num)', 'BarangController::subItem/$1');
$routes->get('barang/sub-item/create/(:num)', 'BarangController::subItemCreate/$1');
$routes->post('barang/sub-item/store/(:num)', 'BarangController::subItemStore/$1');
$routes->get('barang/sub-item/edit/(:num)', 'BarangController::subItemEdit/$1');
$routes->post('barang/sub-item/update/(:num)', 'BarangController::subItemUpdate/$1');
$routes->get('barang/sub-item/delete/(:num)', 'BarangController::subItemDelete/$1');
$routes->post('barang/sub-item/masuk/(:num)', 'BarangController::subItemMasuk/$1');
$routes->post('barang/sub-item/keluar/(:num)', 'BarangController::subItemKeluar/$1');

// ================= BARANG MASUK =================
$routes->get('barang/masuk', 'BarangMasukController::index');
$routes->get('barang/masuk/create', 'BarangMasukController::create');
$routes->post('barang/masuk/store', 'BarangMasukController::store');
$routes->get('barang/masuk/detail/(:num)', 'BarangMasukController::detail/$1');     
$routes->get('barang/masuk/delete/(:num)', 'BarangMasukController::delete/$1');     
$routes->get('barang/masuk/form/(:num)', 'BarangController::formMasuk/$1');

// ================= API ROUTES (Opsional untuk AJAX) =================
$routes->get('api/barang/masuk/detail/(:num)', 'BarangMasukController::getDetailJson/$1');

// ================= BARANG KELUAR =================
$routes->get('barang/keluar', 'BarangKeluarController::index');
$routes->get('barang/keluar/create', 'BarangKeluarController::create');
$routes->post('barang/keluar/store', 'BarangKeluarController::store');
$routes->get('barang/keluar/detail/(:num)', 'BarangKeluarController::detail/$1');   
$routes->get('barang/keluar/delete/(:num)', 'BarangKeluarController::delete/$1');   
$routes->get('barang/keluar/form/(:num)', 'BarangController::formKeluar/$1');

// ================= SEWA =================
$routes->get('sewa/create', 'Sewa::create');
$routes->get('sewa/create/(:num)', 'Sewa::create/$1');
$routes->post('sewa/store', 'Sewa::store');
$routes->get('sewa/success/(:num)', 'Sewa::success/$1');
$routes->get('sewa/edit/(:num)', 'Sewa::edit/$1');
$routes->post('sewa/update/(:num)', 'Sewa::update/$1');
$routes->get('sewa/delete/(:num)', 'Sewa::delete/$1');
$routes->get('sewa/simpanLaporan/(:num)', 'Sewa::simpanLaporan/$1');
$routes->get('laporan/detail/(:num)', 'LaporanController::detail/$1');
$routes->get('laporan/print/(:num)', 'LaporanController::print/$1');

// ================= TRANSAKSI =================
$routes->get('transaksi', 'TransaksiController::index');
$routes->get('transaksi/index', 'TransaksiController::index');
$routes->get('transaksi/detail/(:num)', 'TransaksiController::detail/$1');
$routes->get('transaksi/delete/(:num)', 'TransaksiController::delete/$1');
$routes->get('transaksi/export/pdf', 'TransaksiController::exportPdf');

// ================= OPERATOR =================
$routes->get('operator', 'UserController::index');

// ================= LAPORAN =================
$routes->get('laporan', 'LaporanController::index');
$routes->get('laporan/export/pdf', 'LaporanController::exportPdf');
$routes->get('laporan/detail/(:num)', 'LaporanController::detail/$1');
$routes->get('laporan/print/(:num)', 'LaporanController::print/$1');
$routes->post('laporan/delete/(:num)', 'LaporanController::delete/$1'); 

// ================= LOG =================
$routes->get('/log', 'Log::index');
$routes->get('log/latest', 'Log::latest');
$routes->get('log/getLogs', 'Log::getLogs');

// ================= ENVIRONMENT =================
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}
// ================= PROFILE =================
$routes->get('profile', 'ProfileController::index');
$routes->get('profile/edit', 'ProfileController::edit');
$routes->post('profile/update', 'ProfileController::update');