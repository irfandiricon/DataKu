<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/hubungi-kami', 'Contactus::index');
$routes->get('/pendaftaran', 'Register::index');
$routes->get('/masuk', 'Login::index');
$routes->get('/keluar', 'Login::logout');
$routes->get('/akun', 'Account::index');
$routes->get('/riwayat-transaksi', 'Account::history');

$routes->get('/pulsa-reguler', 'Prabayar::pulsa_reguler');
$routes->get('/pulsa-transfer', 'Prabayar::pulsa_transfer');
$routes->get('/paket-data', 'Prabayar::paket_data');
$routes->get('/telepon-sms', 'Prabayar::telepon_sms');
$routes->get('/pln-prabayar', 'Prabayar::token_pln');
$routes->get('/voucher-interner', 'Prabayar::voucher_internet');

$routes->get('/pln-pascabayar', 'Pascabayar::pln_pascabayar');
$routes->get('/bpjs', 'Pascabayar::bpjs');
$routes->get('/pdam', 'Pascabayar::pdam');
$routes->get('/halo', 'Pascabayar::halo');
$routes->get('/telepon-pascabayar', 'Pascabayar::telepon_pascabayar');
$routes->get('/multifinance', 'Pascabayar::multifinance');
$routes->get('/e-samsat', 'Pascabayar::esamsat');
$routes->get('/tv-kabel', 'Pascabayar::tvkabel');
$routes->get('/pbb', 'Pascabayar::pbb');
$routes->get('/internet', 'Pascabayar::internet');
$routes->get('/gas', 'Pascabayar::gas');

$routes->get('/ovo', 'Emoney::ovo');
$routes->get('/gopay', 'Emoney::gopay');
$routes->get('/dana', 'Emoney::dana');
$routes->get('/linkaja', 'Emoney::linkaja');
$routes->get('/shopeepay', 'Emoney::shopeepay');

$routes->get('/mobile-legends', 'Games::mobile_legends');
$routes->get('/pubg', 'Games::pubg');
$routes->get('/call-of-duty', 'Games::cod');
$routes->get('/arena-of-valor', 'Games::aov');
$routes->get('/free-fire', 'Games::freefire');
$routes->get('/higgs-domino', 'Games::higgsdomino');
$routes->get('/ragnarok', 'Games::ragnarok');

$routes->add('/pricelist/getprice', 'Pricelist::getprice');
$routes->add('/pricelist/getprice/(:any)', 'Pricelist::getprice/$1');
$routes->add('/pricelist/getprice/(:any)/(:any)', 'Pricelist::getprice/$1/$1');
$routes->add('/api/wspricelist/(:any)', 'Api::wspricelist/$1');
$routes->add('/api/wspricelist/(:any)/(:any)', 'Api::wspricelist/$1/$1');
$routes->add('/api/produk/(:any)', 'Api::produk/$1');
$routes->add('/api/plnprepaid/(:any)', 'Api::plnprepaid/$1');


/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
