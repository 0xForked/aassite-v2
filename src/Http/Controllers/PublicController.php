<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PublicController extends Controller
{

    public function index($request, $response)
    {
        // return $this->view->render($response, 'index.twig');
        var_dump(file_exists(base_path() . '/.env')); die();
    }

    public function projects($request, $response)
    {
        //return $this->view->render($response, 'index.twig');
    }

    public function projectDetail($request, $response)
    {
        //return $this->view->render($response, 'index.twig');
    }

    public function blogs($request, $response)
    {
        //return $this->view->render($response, 'index.twig');
    }

    public function blogDetail($request, $response)
    {
        //return $this->view->render($response, 'index.twig');
    }

    public function contact($request, $response)
    {
        //return $this->view->render($response, 'index.twig');
    }

    public function about($request, $response)
    {
        //return $this->view->render($response, 'index.twig');
    }

    public function slides($request, $response)
    {
        //return $this->view->render($response, 'index.twig');
    }

    public function discussions($request, $response)
    {
       // return $this->view->render($response, 'index.twig');
    }

    public function discussionDetail($request, $response)
    {
       // return $this->view->render($response, 'index.twig');
    }


}