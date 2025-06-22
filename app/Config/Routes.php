<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['filter' => 'auth']);

$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login', ['filter' => 'redirect']);
$routes->get('logout', 'AuthController::logout');

$routes->get('/catalog', 'Catalog::index', ['filter' => 'auth']);

// Cart Routes
$routes->group('cart', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'Cart::index');
    $routes->post('', 'Cart::cart_add');
    $routes->post('edit', 'Cart::cart_edit');
    $routes->get('delete/(:any)', 'Cart::cart_delete/$1');
    $routes->get('clear', 'Cart::cart_clear');
});

// Checkout Routes
$routes->get('checkout', 'Cart::checkout', ['filter' => 'auth']);
$routes->get('get-location', 'Cart::getLocation', ['filter' => 'auth']);
$routes->get('get-cost', 'Cart::getCost', ['filter' => 'auth']);
$routes->post('buy', 'Cart::buy', ['filter' => 'auth']);

// Product Routes
$routes->group('product', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'Product::index');
    $routes->post('', 'Product::create');
    $routes->post('edit/(:any)', 'Product::edit/$1');
    $routes->get('delete/(:any)', 'Product::delete/$1');
    $routes->get('download', 'Product::download');
});

// Login Routes
$routes->get('/login', 'Login::index', ['filter' => 'auth']);

// Profile Routes
$routes->get('profile', 'Home::profile', ['filter' => 'auth']);

//REST API
$routes->resource('api', ['controller' => 'apiController']);

// Alann Routes
$routes->get('/me', 'Me::index');
