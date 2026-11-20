<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

// =================================================================
// 1. RUTE PUBLIK (PENGUNJUNG)
// =================================================================
$routes->get('/', 'Home::index');           
$routes->get('/galeri', 'Home::galeri');    
$routes->get('/about', 'Home::about');      
$routes->get('/contact', 'Home::contact');  
$routes->post('/contact/send', 'Home::kirim_pesan'); 

// PERBAIKAN: Rute Menu dumasar Kategori
$routes->get('/menu', 'Home::menu'); 
$routes->get('/menu/(:any)', 'Home::menu/$1'); 


// =================================================================
// 2. RUTE OTENTIKASI
// =================================================================
$routes->get('/login', 'AuthController::index');
$routes->post('/login/auth', 'AuthController::auth');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/register', 'AuthController::register');
$routes->post('/register/save', 'AuthController::save');


// =================================================================
// 3. RUTE ADMIN (BACKEND)
// =================================================================
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Admin::index');              
    $routes->get('create', 'Admin::create');        
    $routes->post('store', 'Admin::store');         
    $routes->get('edit/(:num)', 'Admin::edit/$1');    
    $routes->post('update/(:num)', 'Admin::update/$1'); 
    $routes->get('delete/(:num)', 'Admin::delete/$1');  

    $routes->get('galeri', 'Admin::galeri');
    $routes->get('galeri/create', 'Admin::galeri_create');
    $routes->post('galeri/store', 'Admin::galeri_store');
    $routes->get('galeri/edit/(:num)', 'Admin::galeri_edit/$1');
    $routes->post('galeri/update/(:num)', 'Admin::galeri_update/$1');
    $routes->get('galeri/delete/(:num)', 'Admin::galeri_delete/$1');

    $routes->get('about', 'Admin::about');
    $routes->post('about/update', 'Admin::about_update');

    $routes->get('pesan', 'Admin::pesan');
    $routes->get('pesan/delete/(:num)', 'Admin::pesan_delete/$1'); 
});