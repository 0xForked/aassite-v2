<?php

namespace App\Http\Middlewares;

class GuestMiddleware extends Middleware
{

    public function __invoke($request, $response, $next)
    {

        if ($this->container->auth->check()) {
            return $response->withRedirect($this->container->router->pathFor('dashboard.home'));
        }

        $response = $next($request, $response);
        return $response;

    }

}