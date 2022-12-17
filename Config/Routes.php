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

//param get & post
$routes->get('/post_request', 'Form::post_request');
$routes->post('/post_response', 'Form::post_response');
$routes->get('/get_request', 'Form::get_request');
$routes->get('/get_response/(:segment)', 'Form::get_response/$1');
//end param get & post

// table vcd
// $routes->get('/vcd', 'Vcd::list', ['filter' => 'authGuard']);
$routes->get('/vcd', 'vcd::list');
$routes->get('/vcd/insert', 'vcd::insert');
$routes->post('/vcd/insert', 'vcd::insert_save');
$routes->get('/vcd/(:segment)', 'vcd::update/$1');
$routes->post('/vcd/(:segment)', 'vcd::update_save/$1');
$routes->get('/vcd/delete/(:segment)', 'vcd::delete/$1');

// table genre
$routes->get('/genre', 'genre::list');
$routes->get('/genre/insert', 'genre::insert');
$routes->post('/genre/insert', 'genre::insert_save');
$routes->get('/genre/(:segment)', 'genre::update/$1');
$routes->post('/genre/(:segment)', 'genre::update_save/$1');
$routes->get('/genre/delete/(:segment)', 'genre::delete/$1');

// table customers
$routes->get('/customers', 'customers::list');
$routes->get('/customers/insert', 'customers::insert');
$routes->post('/customersinsert', 'customers::insert_save');
$routes->get('/customers/(:segment)', 'customers::update/$1');
$routes->post('/customers/(:segment)', 'customers::update_save/$1');
$routes->get('/customers/delete/(:segment)', 'customers::delete/$1');

// export vcd
$routes->get('/vcd_export_xls', 'VcdExport::export_xls');
$routes->get('/vcd_export_pdf', 'VcdExport::export_pdf');




// login
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::login_submit');
$routes->get('/logout', 'Auth::logout');
$routes->get('/admin', 'Dashboard::admin', ['Filter' =>'authGuard']);
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
