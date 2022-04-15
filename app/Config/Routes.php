<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/home/profil', 'Home::profil');
$routes->get('/home/produk', 'Home::produk');
$routes->get('/home/search', 'Home::search');

$routes->get('/daftar', 'Auth::index');
$routes->get('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->get('/fitur/getproduk', 'Fitur::getproduk');

$routes->get('/admin', 'Admin::index',['filter'=>'adminfilter']);
$routes->get('/admin/dataproduk', 'Admin::dataproduk',['filter'=>'adminfilter']);
$routes->get('/admin/getproduk', 'Admin::getProduk',['filter'=>'adminfilter']);


$routes->post('/admin/saveproduk', 'Admin::saveproduk',['filter'=>'adminfilter']);
$routes->post('/daftar','Auth::savedaftar');
$routes->post('/login','Auth::savelogin');
$routes->post('/home/buy','Home::buy',['filter'=>'authfilter']);
$routes->post('/home/addkeranjang','Home::addkeranjang',['filter'=>'authfilter']);


// delete
$routes->delete('/admin/deleteproduk', 'Admin::deleteproduk',['filter'=>'adminfilter']);
// put
$routes->put('/admin/editdataproduk', 'Admin::editdataproduk',['filter'=>'adminfilter']);

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
