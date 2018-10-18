<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Message;

class DashboardController extends Controller
{

    public function getHome($request, $response)
    {
        $setting = Controller::getSetting();

        $data = [
            'setting' => $setting,
            'menu_status' => 'home'
        ];

        return $this->view->render($response, 'dashboard/home.twig', $data);
    }

    public function getMessages($request, $response)
    {
        $setting = Controller::getSetting();

        $page = ($request->getParam('p', 0) > 0) ? $request->getParam('p') : 1;

        $limit = 15;

        $skip = ($page - 1) * $limit;

        $message = Message::take($limit)->skip($skip)->get();
        $message_count = Message::all()->count();

        $data = [
            'menu_status' => 'message',
            'setting' => $setting,
            'message_list' => $message,
            'message_count' => $message_count,
            'message_pagination'    => [
                'needed'        => $message_count > $limit,
                'page'          => $page,
                'lastpage'      => (ceil($message_count / $limit) == 0 ? 1 : ceil($message_count / $limit)),
            ],
        ];

        return $this->view->render($response, 'dashboard/message.twig', $data);
    }

    public function getArticles($request, $response)
    {
        $setting = Controller::getSetting();

        $data = [
            'menu_status' => 'article',
            'setting' => $setting,
        ];
        return $this->view->render($response, 'dashboard/article.twig', $data);
    }

    public function getProjects($request, $response)
    {
        $setting = Controller::getSetting();

        $data = [
            'menu_status' => 'project',
            'setting' => $setting,

        ];

        return $this->view->render($response, 'dashboard/project.twig', $data);
    }

    public function getSlides($request, $response)
    {
        $setting = Controller::getSetting();

        $data = [
            'menu_status' => 'slide',
            'setting' => $setting,
        ];

        return $this->view->render($response, 'dashboard/slide.twig', $data);
    }

    public function getDiscussions($request, $response)
    {
        $setting = Controller::getSetting();

        $data = [
            'menu_status' => 'discussion',
            'setting' => $setting,
        ];

        return $this->view->render($response, 'dashboard/discussion.twig', $data);
    }

    public function getGalleries($request, $response)
    {
        $setting = Controller::getSetting();

        $data = [
            'menu_status' => 'gallery',
            'setting' => $setting,
        ];

        return $this->view->render($response, 'dashboard/gallery.twig', $data);
    }

    public function getCategoryAndTag($request, $response)
    {

        $setting = Controller::getSetting();

        $page_tag = ($request->getParam('tp', 0) > 0) ? $request->getParam('tp') : 1;
        $page_category = ($request->getParam('cp', 0) > 0) ? $request->getParam('cp') : 1;

        $limit = 3;

        $skip_tag = ($page_tag - 1) * $limit;
        $skip_category = ($page_category - 1) * $limit;

        $tag = Tag::take($limit)->skip($skip_tag)->get();
        $category = Category::take($limit)->skip($skip_category)->get();

        $tag_count = Tag::all()->count();
        $category_count = Category::all()->count();

        $data = [
            'menu_status' => 'category-tag',
            'setting' => $setting,
            'tag_list' => $tag,
            'tag_count' => $tag_count,
            'tag_pagination'    => [
                'needed'        => $tag_count > $limit,
                'page'          => $page_tag,
                'lastpage'      => (ceil($tag_count / $limit) == 0 ? 1 : ceil($tag_count / $limit)),
            ],

            'category_list' => $category,
            'category_count' => $category_count,
            'category_pagination' => [
                'needed'        => $category_count > $limit,
                'page'          => $page_category,
                'lastpage'      => (ceil($category_count / $limit) == 0 ? 1 : ceil($category_count / $limit)),
            ],
        ];

        return $this->view->render($response, 'dashboard/category-tag.twig', $data);

    }

}