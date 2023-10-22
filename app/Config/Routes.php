<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->setAutoRoute(true);

$routes->get('/', 'Home::index', ['filter' => 'authGuard']);
$routes->get('/login', 'Auth::index', ['filter' => 'isLogin']);
$routes->post('/login', 'Auth::loginAuth');
$routes->get('/logout', 'Auth::logout');
$routes->resource('register', ['filter' => 'isLogin']);
$routes->get('/book', 'Book::index', ['filter' => 'authGuard']);
$routes->get('/(:segment)', 'Home::show/$1', ['filter' => 'authGuard']);
$routes->get('/book/add', 'Book::new', ['filter' => 'authGuard']);
$routes->post('/book/add', 'Book::create', ['filter' => 'authGuard']);
$routes->get('/book/delete/(:segment)', 'Book::delete/$1', ['filter' => 'authGuard']);
$routes->get('/book/edit/(:segment)', 'Book::edit/$1', ['filter' => 'authGuard']);
$routes->post('/book/edit/(:segment)', 'Book::update/$1', ['filter' => 'authGuard']);