<?php

use App\Http\Middlewares\AuthMiddleware;
use App\Http\Middlewares\GuestMiddleware;


/*
|----------------------------------------------------
| Routing sytem                                      |
|----------------------------------------------------
*/

$app->get('/', 'HomeController:index')->setName('public.home');
$app->get('/blog', 'HomeController:index')->setName('public.blog');
$app->get('/project', 'HomeController:index')->setName('public.project');
$app->get('/contact', 'HomeController:index')->setName('public.contact');
$app->get('/about', 'HomeController:index')->setName('public.about');
$app->get('/slide', 'HomeController:index')->setName('public.slide');
$app->get('/discussion', 'HomeController:index')->setName('public.slide');

$app->group('', function() {

    $this->get('/login', 'AuthController:getSignIn')->setName('auth.signin');
    $this->post('/login', 'AuthController:postSignIn');

    $this->get('/register', 'AuthController:getSignUp')->setName('auth.signup');
    $this->post('/register', 'AuthController:postSignUp');

})->add(new GuestMiddleware($container));


$app->group('', function() {

    $this->get('/logout', 'AuthController:getSignOut')->setName('auth.signout');

})->add(new AuthMiddleware($container));