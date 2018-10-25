<?php

/*
|----------------------------------------------------
| Controller                                        |
|----------------------------------------------------
*/

$container['PublicController'] = function ($container) {
    return new \App\Http\Controllers\PublicController($container);
};

$container['AuthController'] = function ($container) {
    return new \App\Http\Controllers\AuthController($container);
};

$container['DashController'] = function ($container) {
    return new \App\Http\Controllers\DashboardController($container);
};

$container['TagCatController'] = function ($container) {
    return new \App\Http\Controllers\Main\TagCategoryController($container);
};

$container['MessageController'] = function ($container) {
    return new \App\Http\Controllers\Main\MessageController($container);
};

$container['SettingController'] = function ($container) {
    return new \App\Http\Controllers\Main\SettingController($container);
};

$container['ProjectController'] = function ($container) {
    return new \App\Http\Controllers\Main\ProjectController($container);
};

$container['ArticleController'] = function ($container) {
    return new \App\Http\Controllers\Main\ArticleController($container);
};

$container['DiscussionController'] = function ($container) {
    return new \App\Http\Controllers\Main\DiscussionController($container);
};

$container['SlideController'] = function ($container) {
    return new \App\Http\Controllers\Main\SlideController($container);
};

