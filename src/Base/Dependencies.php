<?php

use Illuminate\Database\Capsule\Manager as Eloquent;
use Respect\Validation\Validator as RespectValidation;
use PHPMailer\PHPMailer\PHPMailer;
use App\Validations\Validator;
use App\Mailers\Mailer;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FingersCrossedHandler;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Slim\Csrf\Guard;
use App\Base\Auth;
use Slim\Flash\Messages;

use App\Http\Middlewares\ValidationErrorsMiddlerware as ValidatorMidd;
use App\Http\Middlewares\Authentication as AuthMidd;

/*
|----------------------------------------------------
| Slim Container                                    |
|----------------------------------------------------
*/

    $container = $app->getContainer();

/*
|----------------------------------------------------
| Eloquent ORM                                      |
|----------------------------------------------------
*/

    $capsule =  new Eloquent();
    $capsule->addConnection($container['settings']['db']);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();

/*
|----------------------------------------------------
| Monolog Logger                                    |
|----------------------------------------------------
*/

    $container['logger'] = function($c) {
        $logger = new Logger('logger');
        $log_dir = __DIR__ . ('/../../logs/app.log');
        $log_handler = new StreamHandler($log_dir, Logger::DEBUG);
        $log_crossed_handler = new FingersCrossedHandler($log_handler, Logger::ERROR);
        $logger->pushHandler($log_crossed_handler);
        return $logger;
    };

/*
|----------------------------------------------------
| Respect Validator                                 |
|----------------------------------------------------
*/

    $container['validator'] = function ($container)
    {
        return new Validator($container);
    };

    RespectValidation::with('Src\\Validations\\Rules\\');


/*
|----------------------------------------------------
|  SLIM CSRF                                        |
|----------------------------------------------------
*/

    $container['csrf'] = function ($container) {
        return new Guard;
    };

/*
|----------------------------------------------------
|  Auth                                             |
|----------------------------------------------------
*/

    $container['auth'] = function ($container) {
        return new Auth;
    };

/*
|----------------------------------------------------
|  Flash                                            |
|----------------------------------------------------
*/

    $container['flash'] = function ($container) {
        return new Messages;
    };

/*
|----------------------------------------------------
| Twig & View                                       |
|----------------------------------------------------
*/

    $container['view'] = function ($container)
    {
        $view = new Twig(
            __DIR__ . '/../../resources/views/',
            [ 'cache' => false ]
        );

        $basePath = rtrim(str_ireplace('index.php', '',
            $container['request']->getUri()->getBasePath()), '/'
        );

        $view->addExtension(new TwigExtension($container['router'], $basePath));

        $view->getEnvironment()->addGlobal('auth', [
            'check' => $container->auth->check(),
            'user' => $container->auth->user()
        ]);

        $view->getEnvironment()->addGlobal('flash', $container->flash);

        return $view;
    };

    $container['notFoundHandler'] = function ($container)
    {
        return function ($request, $response) use ($container)
        {
            return $container->view->render($response, '/error/404.twig');
        };
    };

/*
|----------------------------------------------------
| Upload Files                                      |
|----------------------------------------------------
*/
    $container['img_directory'] = __DIR__ . '/../../public/assets/img/upload/';