<?php

use App\Http\Middlewares\AuthMiddleware;
use App\Http\Middlewares\GuestMiddleware;


/*
|----------------------------------------------------
| Routing sytem                                      |
|----------------------------------------------------
*/

$app->get('/', 'PublicController:index')->setName('public.home');

$app->get('/blog', 'PublicController:blog')->setName('public.blog');
$app->get('/blog/article/{slug}', 'PublicController:blogDetail')->setName('public.blog.detail');
$app->get('/project', 'PublicController:project')->setName('public.project');
$app->get('/project/{slug}', 'PublicController:projectDetail')->setName('public.project.detail');
$app->get('/contact', 'PublicController:contact')->setName('public.contact');
$app->get('/about', 'PublicController:about')->setName('public.about');
$app->get('/slide', 'PublicController:slide')->setName('public.slide');
$app->get('/discussion', 'PublicController:discussion')->setName('public.discussion');

$app->group('', function() {

    $this->get('/login', 'AuthController:getSignIn')->setName('auth.signin');
    $this->post('/login', 'AuthController:postSignIn');

    //$this->get('/register', 'AuthController:getSignUp')->setName('auth.signup');
    //$this->post('/register', 'AuthController:postSignUp');

})->add(new GuestMiddleware($container));


$app->group('/dashboard', function() {

    $this->get('/home', 'DashController:getHome')->setName('dashboard.home');

    $this->get('/message', 'DashController:getMessages')->setName('dashboard.message');
    $this->get('/message/mark', 'MessageController:mark')->setName('dashboard.message.mark');
    $this->get('/message/delete', 'MessageController:delete')->setName('dashboard.message.delete');



    $this->get('/article', 'DashController:getArticles')->setName('dashboard.article');

    $this->get('/project', 'DashController:getProjects')->setName('dashboard.project');
    $this->post('/project/create', 'ProjectController:create')->setName('dashboard.project.create');
    $this->post('/project/update', 'ProjectController:update')->setName('dashboard.project.update');
    $this->get('/project/delete', 'ProjectController:delete')->setName('dashboard.project.delete');
    $this->get('/project/mark', 'ProjectController:mark')->setName('dashboard.project.mark');




    $this->get('/slide', 'DashController:getSlides')->setName('dashboard.slide');
    $this->post('/slide/create', 'SlideController:create')->setName('dashboard.slide.create');
    $this->post('/slide/update', 'SlideController:update')->setName('dashboard.slide.update');
    $this->get('/slide/delete', 'SlideController:delete')->setName('dashboard.slide.delete');



    $this->get('/discussion', 'DashController:getDiscussions')->setName('dashboard.discussion');
    $this->post('/discussion/create', 'DiscussionController:createByAdmin')->setName('dashboard.discussion.create');
    $this->get('/discussion/mark', 'DiscussionController:mark')->setName('dashboard.discussion.mark');
    $this->get('/discussion/delete', 'DiscussionController:delete')->setName('dashboard.discussion.delete');



    $this->get('/gallery', 'DashController:getGalleries')->setName('dashboard.gallery');


    $this->get('/category-and-tag', 'DashController:getCategoryAndTag')
    ->setName('dashboard.category&tag');
    $this->post('/tag/create', 'TagCatController:createTag')
    ->setName('dash.tag.create');
    $this->post('/category/create', 'TagCatController:createCategory')
    ->setName('dash.category.create');
    $this->get('/category/delete', 'TagCatController:deleteCategory');
    $this->get('/tag/delete', 'TagCatController:deleteTag');


    $this->post('/setting', 'SettingController:update')->setName('dashboard.setting.update');

    $this->get('/logout', 'AuthController:getSignOut')->setName('auth.signout');

})->add(new AuthMiddleware($container));