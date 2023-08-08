<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setAutoRoute(true);
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::login');
$routes->get('/register', 'Auth::register');

$routes->get('/home', 'Home::index');

$routes->get('/pasien', 'Pasien::index');
$routes->get('/pasien/tambah', 'Pasien::tambah');
$routes->get('/pasien/ubah/(:num)', 'Pasien::index/$1');
$routes->delete('/pasien/(:num)', 'Pasien::hapus/$1');
$routes->get('/pasien/(:any)', 'Pasien::index/$1');

$routes->get('/pemeriksa', 'Pemeriksa::index');
$routes->get('/pemeriksa/tambah', 'Pemeriksa::tambah');
$routes->get('/pemeriksa/ubah/(:num)', 'Pemeriksa::index/$1');
$routes->delete('/pemeriksa/(:num)', 'Pemeriksa::hapus/$1');
$routes->get('/pemeriksa/(:any)', 'Pemeriksa::index/$1');

$routes->get('/pengguna', 'Pengguna::index');
$routes->get('/pengguna/tambah', 'Pengguna::tambah');
$routes->get('/pengguna/ubah/(:num)', 'Pengguna::index/$1');
$routes->delete('/pengguna/(:num)', 'Pengguna::hapus/$1');
$routes->get('/pengguna/(:any)', 'Pengguna::index/$1');

$routes->get('/penilaian', 'Penilaian::index');
$routes->get('/penilaian/tambah', 'Penilaian::tambah');
$routes->get('/penilaian/dokumentasi', 'Penilaian::dokumentasi');

$routes->get('/profil', 'Profil::index');
$routes->get('/profil/ubah/(:num)', 'Profil::index/$1');
$routes->get('/profil/(:any)', 'Profil::index/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
