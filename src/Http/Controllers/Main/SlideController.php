<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Slide;


class SlideController extends Controller
{


    public function getAll($request, $response)
    {

    }

    public function create($request, $response)
    {
        $all_post_vars = $request->getParsedBody();
        $title = $all_post_vars['slideAddTitle'];
        $desc = $all_post_vars['slideAddDesc'];
        $link = $all_post_vars['slideAddLink'];
        $status = 1;
        $data = [
            'title' => $title,
            'desc' => $desc,
            'link' => $link,
            'status' => $status,
        ];

        $slide = Slide::create($data);

        if (!$slide) {
            $this->flash->addMessage('error', 'Failed create slide!');
            return $response->withRedirect($this->router->pathFor('dashboard.slide'));
        }

        $this->flash->addMessage('info', 'slide created!');
        return $response->withRedirect($this->router->pathFor('dashboard.slide'));
    }

    public function update($request, $response)
    {
        $all_post_vars = $request->getParsedBody();
        $title = $all_post_vars['slideEditTitle'];
        $desc = $all_post_vars['slideEditDesc'];
        $link = $all_post_vars['slideEditLink'];
        $id = $all_post_vars['slideEditId'];
        $status = 1;

        $data = [
            'title' => $title,
            'desc' => $desc,
            'link' => $link,
            'status' => $status,
        ];

        $slide = Slide::where('id', $id)->update($data);

        if (!$slide) {
            $this->flash->addMessage('error', 'Failed update slide!');
            return $response->withRedirect($this->router->pathFor('dashboard.slide'));
        }

        $this->flash->addMessage('info', 'slide update!');
        return $response->withRedirect($this->router->pathFor('dashboard.slide'));
    }

    public function delete($request, $response)
    {
        $id = $request->getParam('id');
        $slide = Slide::where('id', $id)->delete();

        if (!$slide) {
            $this->flash->addMessage('error', 'Failed delete slide!');
            return $response->withRedirect($this->router->pathFor('dashboard.slide'));
        }

        $this->flash->addMessage('info', 'slide deleted!');
        return $response->withRedirect($this->router->pathFor('dashboard.slide'));
    }

}