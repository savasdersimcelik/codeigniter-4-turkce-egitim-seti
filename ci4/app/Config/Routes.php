<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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

// Namespace\ClassName::metot
//$routes->get('/', 'Frontend\Home::index');

$routes->group('api', function ($routes) {
    $routes->group('v1', function ($routes) {

        $routes->resource('blog', [
            'namespace' => 'App\Controllers\Api\V1',
            'controller' => 'BlogResource',
            'only' => ['index', 'create', 'show'],
            //'websafe' => 1,
            //'placeholder' => '(:alpha)'
        ]);

        $routes->group('product', ['namespace' => 'App\Controllers\Api\V1'], function ($routes) {
            $routes->get('generic', 'Product::generic');
            $routes->get('failure', 'Product::failure');
            $routes->get('created', 'Product::created');
            $routes->get('deleted', 'Product::deleted');
            $routes->get('noContent', 'Product::noContent');
            $routes->get('unauthorized', 'Product::unauthorized');
            $routes->get('forbidden', 'Product::forbidden');
        });

        $routes->group('order', ['namespace' => 'App\Controllers\Api\V1'], function ($routes) {
            $routes->get('istekturu', 'Orders::reqType');
            $routes->match(['get', 'post', 'put', 'delete'], 'metotturu', 'Orders::methodType');
            $routes->get('httpturu', 'Orders::secureType');
            $routes->match(['get', 'post', 'put', 'delete'], 'datayaka', 'Orders::inputget');
            $routes->match(['get', 'post', 'put', 'delete'], 'jsonyakala', 'Orders::inputjson');
            $routes->post('dosyayakala', 'Orders::inputFile');
        });
    });
});

$routes->group('{locale}', function ($routes) {
    $routes->group('gorsel', function ($routes) {
        $routes->get('/', 'GorselController::index', ['namespace' => 'App\Controllers\Frontend']);
        $routes->get('kalite', 'GorselController::kalite', ['namespace' => 'App\Controllers\Frontend']);
        $routes->get('boyutlandir', 'GorselController::boyutlandir', ['namespace' => 'App\Controllers\Frontend']);
        $routes->get('thumbnail', 'GorselController::thumbnail', ['namespace' => 'App\Controllers\Frontend']);
        $routes->get('donder', 'GorselController::donder', ['namespace' => 'App\Controllers\Frontend']);
        $routes->get('kirp', 'GorselController::kirp', ['namespace' => 'App\Controllers\Frontend']);
        $routes->get('donustur', 'GorselController::donustur', ['namespace' => 'App\Controllers\Frontend']);
        $routes->get('yaziekle', 'GorselController::yaziekle', ['namespace' => 'App\Controllers\Frontend']);
    });

    $routes->get('sms/gonder', 'KutuphaneController::index', ['namespace' => 'App\Controllers\Frontend']);

    $routes->get('event/calistir', 'EventController::index', ['namespace' => 'App\Controllers\Frontend']);

    $routes->get('/', 'Home::index', ['namespace' => 'App\Controllers\Frontend']);

    $routes->get('iletisim', 'Page::contact', ['namespace' => 'App\Controllers\Frontend']);

    $routes->get('onbellekdersi', 'OnbellekController::index', ['namespace' => 'App\Controllers\Frontend']);

    $routes->get('sessiondersi', 'SessionDersleri::index', ['namespace' => 'App\Controllers\Frontend']);

    $routes->get('blockertest', 'BlockerController::index', ['namespace' => 'App\Controllers\Frontend']);

    $routes->get('ajanbilgiver', 'AjanController::index', ['namespace' => 'App\Controllers\Frontend']);

    $routes->match(['get', 'post'], 'honeypot', 'Form::honeypot', ['namespace' => 'App\Controllers\Frontend']);

    $routes->group('blog', function ($routes) {
        $routes->get('single/(:any)', 'Frontend\Blog::single/$1');
        $routes->get('category/(:any)', 'Frontend\Blog::category/$1');
    });
});

$routes->group('admin', function ($routes) {

    $routes->group('kullanici', function ($routes) {
        $routes->get('ekle', 'Backend\KullaniciController::ekle');
        $routes->get('getir/(:num)', 'Backend\KullaniciController::getir/$1');
        $routes->get('listele', 'Backend\KullaniciController::listele');
        $routes->get('duzenle/(:num)', 'Backend\KullaniciController::duzenle/$1');
        $routes->get('sil/(:num)', 'Backend\KullaniciController::sil/$1');
        $routes->get('silinenleri-listele', 'Backend\KullaniciController::silinenleriListele');
        $routes->get('aktifleri-listele', 'Backend\KullaniciController::aktifleriListeli');
        $routes->get('pasifleri-listele', 'Backend\KullaniciController::pasifleriListele');
        $routes->get('sutun-listele', 'Backend\KullaniciController::sutunListele');
        $routes->get('offset-listele/(:num)/(:num)', 'Backend\KullaniciController::offsetListele/$1/$2');
        $routes->get('sorgu-olustur', 'Backend\KullaniciController::sorguOlustur');
    });

    $routes->group('send', function ($routes) {
        $routes->get('sms', 'Backend\Send::sms');
        $routes->get('email', 'Backend\Send::email');
    });

    $routes->group('blog', function ($routes) {
        $routes->get('insert/(:any)', 'Backend\Blog::insert/$1', [
            'as' => 'blog_insert',
            'filter' => 'adminauth',
        ]);
        $routes->get('update', 'Backend\Blog::update', [
            'as' => 'blog_update',
            'filter' => 'adminauth',
        ]);
        $routes->get('delete', 'Backend\Blog::delete', [
            'as' => 'blog_delete',
            'filter' => 'adminauth',
        ]);
    });

    $routes->group('users', ['filter' => 'adminauth'], function ($routes) {
        $routes->get('listing', 'Backend\Users::listing', ['as' => 'user_listing']);
        $routes->match(['get', 'post'], 'yenikullaniciekle', 'Backend\Users::create', ['as' => 'user_create']);
        $routes->match(['get', 'post'], 'yenikullaniciekle2', 'Backend\Users::new', ['as' => 'user_new']);
    });

    $routes->get('login', 'Backend\Auth::login', [
        'as' => 'admin_login',
    ]);

    $routes->get('dashboard', 'Backend\Dashboard::index', [
        'as' => 'admin_dashboard',
        'filter' => 'adminauth',
    ]);

});

$routes->environment('development', function ($routes) {
    $routes->get('/test/dev', 'Home::index', ['namespace' => 'App\Controllers\Frontend']);
});

/*$routes->get('/admin/dashboard', 'Backend\Dashboard::index');
$routes->post('/admin/dashboard', 'Backend\Dashboard::index');
$routes->put('/admin/dashboard', 'Backend\Dashboard::index');
$routes->delete('/admin/dashboard', 'Backend\Dashboard::index');
$routes->match(['get', 'post', 'delete'],'/admin/dashboard', 'Backend\Dashboard::index');*/

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
