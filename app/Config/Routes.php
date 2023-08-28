<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
//$routes->setDefaultController('Home');
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
//$routes->get('/', 'Home::index');
$routes->setDefaultController('Login');
$routes->get('/', 'Login::index', ['filter' => 'guestFilter']);
$routes->get('/register', 'Register::index', ['filter' => 'guestFilter']);
$routes->post('/register', 'Register::register', ['filter' => 'guestFilter']);
 
$routes->get('/login', 'Login::index', ['filter' => 'guestFilter']);
$routes->post('/login', 'Login::authenticate', ['filter' => 'guestFilter']);
 
$routes->get('/logout', 'Login::logout', ['filter' => 'authFilter']);
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'authFilter']);
$routes->get('/profile', 'Dashboard::profile', ['filter' => 'authFilter']);
$routes->get('/customer', 'Customer::index', ['filter' => 'authFilter']);
$routes->get('/addcustomer', 'Customer::add_customer', ['filter' => 'authFilter']);
$routes->post('/customer/store_customer', 'Customer::store_customer', ['filter' => 'authFilter']);
$routes->get('/vendor', 'Vendor::index', ['filter' => 'authFilter']);
$routes->get('/vendor/list/(:num)', 'Vendor::customers/$1', ['filter' => 'authFilter']);
$routes->get('/vendor/vend_orders/(:num)', 'Vendor::customer_order/$1', ['filter' => 'authFilter']);
$routes->get('/vendor/products/(:num)', 'Vendor::products/$1', ['filter' => 'authFilter']);
$routes->get('/productlist', 'Vendor::productlist', ['filter' => 'authFilter']);
$routes->get('/vendor/order/(:num)', 'Vendor::orders/$1', ['filter' => 'authFilter']);
$routes->get('/orderlist', 'Vendor::orderlist', ['filter' => 'authFilter']);
$routes->get('/vendor/remove/(:num)', 'Vendor::removeorder/$1', ['filter' => 'authFilter']);
$routes->get('/vendorproducts','Dashboard::vendorproducts', ['filter' => 'authFilter']);
$routes->get('/vendor/delete_p/(:num)', 'Vendor::productdelete/$1', ['filter' => 'authFilter']);
$routes->get('/vendor/approve/(:num)', 'Vendor::orderapprove/$1', ['filter' => 'authFilter']);
$routes->get('/vendor/reject/(:num)', 'Vendor::orderreject/$1', ['filter' => 'authFilter']);
$routes->get('/customer/orders/(:num)', 'Customer::orders/$1', ['filter' => 'authFilter']);



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
