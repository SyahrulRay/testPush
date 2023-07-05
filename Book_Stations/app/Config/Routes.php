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
$routes->get('/', 'MainController::index');
$routes->get('/transaksi', 'MainController::transaksi');
$routes->get('/product', 'MainController::product');
$routes->get('/login', 'LoginController::index');
$routes->get('/register', 'RegisterController::index');
$routes->post('/register/process', 'RegisterController::process');
$routes->post('/login/process', 'LoginController::process');
$routes->get('/logout', 'LoginController::logout');
$routes->get('/profile', 'ProfileController::index');
$routes->get('/register', 'register::index');
$routes->post('/comment', 'AddComments::process');
$routes->get('/transactions', 'TransactionController::index');
$routes->get('/invoice', 'InvoiceController::pdfGenerator');
$routes->get('/confirm', 'InvoiceController::index');
$routes->get('/cart', 'CartController::index', ['filter' => 'auth']);
$routes->post('/add_transactions', 'TransactionController::AddTransaction');
$routes->post('/update_status', 'TransactionController::updateStatus');
$routes->post('/update_cart_status', 'TransactionController::updateCartStatus');
$routes->post('/update_stock', 'AdminController::update_stock');
$routes->post('/delete_stock', 'AdminController::delete_stock');
$routes->get('/addproduct', 'AdminController::index');

$routes->get('buy/(:any)', 'BuyController::$1', ['filter' => 'auth']);
$routes->post('buy/(:any)', 'BuyController::$1');
$routes->get('admin/(:any)', 'AdminController::$1', ['filter' => 'admin']);
$routes->post('admin/(:any)', 'AdminController::$1');
$routes->get('cart/(:any)', 'CartController::$1', ['filter' => 'auth']);
$routes->post('cart/(:any)', 'CartController::$1');
$routes->get('transaction/(:any)', 'TransactionController::$1');
$routes->post('transaction/(:any)', 'TransactionController::$1');
$routes->get('invoice/(:any)', 'InvoiceController::$1');
$routes->post('invoice/(:any)', 'InvoiceController::$1');


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
