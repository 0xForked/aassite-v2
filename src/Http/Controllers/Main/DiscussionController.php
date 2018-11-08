<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Discussion;
use App\Models\Tag;
use Respect\Validation\Validator;

class DiscussionController extends Controller
{

    public function createByAdmin($request, $response)
    {

        $validation = $this->validator->validate($request, [
            'titleDiscussion' => Validator::notEmpty(),
            'bodyDiscussion' => Validator::notEmpty(),
        ]);

        if ($validation->failed()) {
            $this->flash->addMessage('error', 'Failed create discussion!');
            return $response->withRedirect($this->router->pathFor('dashboard.discussion'));
        }

        $all_post_vars = $request->getParsedBody();
        $title = $all_post_vars['titleDiscussion'];
        $body = $all_post_vars['bodyDiscussion'];
        $creator = $all_post_vars['creatorDiscussion'];
        $categories = $all_post_vars['categoryDiscussion'];
        $tags = explode(",", str_replace(array('[',']'), '', $all_post_vars['tagDiscussion']));
        $slug = Controller::getSlug($title);
        $status = 2;

        $data = [
            'creator' => $creator,
            'slug' => $slug,
            'title' => $title,
            'body' => $body,
            'status' => $status
        ];

        $discussion = Discussion::create($data);

        if (!$discussion) {
            $this->flash->addMessage('error', 'Failed create discussion!');
            return $response->withRedirect($this->router->pathFor('dashboard.discussion'));
        }

        foreach ($categories as $category) {
            $discussion->category()->attach($category);
        }

        foreach ($tags as $tag) {
            $discussion->tag()->attach($tag);
        }

        $this->flash->addMessage('info', 'discussion created!');
        return $response->withRedirect($this->router->pathFor('dashboard.discussion'));
    }

    public function delete($request, $response)
    {
        $id = $request->getParam('id');
        $discussion = Discussion::where('id', $id)->delete();

        if (!$discussion) {
            $this->flash->addMessage('error', 'Failed delete Discussion!');
            return $response->withRedirect($this->router->pathFor('dashboard.discussion'));
        }

        $this->flash->addMessage('info', 'Discussion deleted!');
        return $response->withRedirect($this->router->pathFor('dashboard.discussion'));
    }

    public function mark($request, $response)
    {
        $id = $request->getParam('id');
        // $status = ($request->getParam('status') == 'important') ? 3 : 0;
        $status_passed = $request->getParam('status');

        if ($status_passed == "important") {
            $status = 3;
        } else if ($status_passed == "closed_important") {
            $status = 4;
        } else {
            $status = 0;
        }

        $discussion = Discussion::where('id', $id)->update(['status' => $status]);

        if (!$discussion) {
            $this->flash->addMessage('error', 'Failed mark Discussion!');
            return $response->withRedirect($this->router->pathFor('dashboard.discussion'));
        }

        $this->flash->addMessage('info', 'Discussion marked!');
        return $response->withRedirect($this->router->pathFor('dashboard.discussion'));
    }

    public function createByUser($request, $response)
    {
        $all_post_vars = $request->getParsedBody();
        $title = $all_post_vars['titleDiscussion'];
        $body = $all_post_vars['bodyDiscussion'];
        $status = 1; // user must confirm by email to publish hes article
        // do send email logic
    }

    public function updateByUser($request, $response)
    {

    }



}