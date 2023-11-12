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

$routes->get('/forgot-password', 'Auth::forgotPassword', ['filter' => 'isLogin']);
$routes->post('/forgot-password', 'Auth::changePassword', ['filter' => 'isLogin']);

$routes->resource('register', ['filter' => 'isLogin']);

$routes->get('/book', 'Book::index', ['filter' => ['authGuard', 'isAdmin']]);
$routes->get('/book/add', 'Book::new', ['filter' => ['authGuard', 'isAdmin']]);
$routes->post('/book/add', 'Book::create', ['filter' => ['authGuard', 'isAdmin']]);
$routes->get('/book/delete/(:segment)', 'Book::delete/$1', ['filter' => ['authGuard', 'isAdmin']]);
$routes->get('/book/edit/(:segment)', 'Book::edit/$1', ['filter' => ['authGuard', 'isAdmin']]);
$routes->post('/book/edit/(:segment)', 'Book::update/$1', ['filter' => ['authGuard', 'isAdmin']]);

$routes->get('/loan', 'Loan::index', ['filter' => ['authGuard', 'isAdmin']]);
$routes->post('/loan/return/(:num)', 'Loan::return/$1', ['filter' => ['authGuard', 'isAdmin']]);

$routes->get('/profile', 'Profile::index', ['filter' => 'authGuard']);

$routes->get('/profile/edit/(:num)', 'Profile::edit/$1', ['filter' => 'authGuard']);
$routes->post('/profile/edit/(:num)', 'Profile::update/$1', ['filter' => 'authGuard']);
$routes->post('/profile/edit/password/(:num)', 'Profile::updatePassword/$1', ['filter' => 'authGuard']);

$routes->get('/payment', 'Payment::index', ['filter' => ['authGuard', 'isAdmin']]);

$routes->get('/user', 'User::index',['filter' => ['authGuard', 'isAdmin']]);
$routes->get('/user/delete/(:num)', 'User::delete/$1', ['filter' => ['authGuard', 'isAdmin']]);
$routes->get('/user/add', 'User::new', ['filter' => ['authGuard', 'isAdmin']]);
$routes->post('/user/add', 'User::create', ['filter' => ['authGuard', 'isAdmin']]);
$routes->get('/user/edit/(:num)', 'User::edit/$1', ['filter' => ['authGuard', 'isAdmin']]);
$routes->post('/user/edit/(:num)', 'User::update/$1', ['filter' => ['authGuard', 'isAdmin']]);
$routes->post('/user/edit/password/(:num)', 'User::updatePassword/$1', ['filter' => 'authGuard']);

$routes->get('/list', 'ListLoan::index', ['filter' => 'authGuard']);

$routes->get('/(:segment)', 'Home::show/$1', ['filter' => 'authGuard']);

$routes->post('(:segment)/loan', 'Loan::create' ,['filter' => 'authGuard']);
