<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Category;

use Respect\Validation\Validator;

class TagCategoryController extends Controller
{

    public function createTag($request, $response)
    {

        $allPostVars = $request->getParsedBody();
        $title = $allPostVars['tagTitle'];
        $desc = $allPostVars['tagDesc'];
        $slug = Controller::getSlug($title);

        $data = [
            'title' => $title,
            'slug' => $slug,
            'desc' => $desc,
        ];

        $tag = Tag::create($data);

        if (!$tag) {
            $this->flash->addMessage('error', 'Failed create Tag!');
            return $response->withRedirect($this->router->pathFor('dashboard.category&tag'));
        }

        $this->flash->addMessage('info', 'Tag created!');
        return $response->withRedirect($this->router->pathFor('dashboard.category&tag'));

    }

    public function deleteTag($request, $response)
    {
        $id = $request->getParam('id');
        $tag = Tag::where('id', $id)->delete();

        if (!$tag) {
            $this->flash->addMessage('error', 'Failed delete Tag!');
            return $response->withRedirect($this->router->pathFor('dashboard.category&tag'));
        }

        $this->flash->addMessage('info', 'Tag deleted!');
        return $response->withRedirect($this->router->pathFor('dashboard.category&tag'));

    }

    public function createCategory($request, $response)
    {
        $allPostVars = $request->getParsedBody();
        $title = $allPostVars['categoryTitle'];
        $desc = $allPostVars['categoryDesc'];
        $slug = Controller::getSlug($title);

        $data = [
            'title' => $title,
            'slug' => $slug,
            'desc' => $desc,
        ];

        $category = Category::create($data);

        if (!$category) {
            $this->flash->addMessage('error', 'Failed create Category!');
            return $response->withRedirect($this->router->pathFor('dashboard.category&tag'));
        }

        $this->flash->addMessage('info', 'Category created!');
        return $response->withRedirect($this->router->pathFor('dashboard.category&tag'));
    }

    public function deleteCategory($request, $response)
    {
        $id = $request->getParam('id');
        $category = Category::where('id', $id)->delete();

        if (!$category) {
            $this->flash->addMessage('error', 'Failed delete Category!');
            return $response->withRedirect($this->router->pathFor('dashboard.category&tag'));
        }

        $this->flash->addMessage('info', 'Category deleted!');
        return $response->withRedirect($this->router->pathFor('dashboard.category&tag'));
    }

}