<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;

use App\Models\Project;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Gallery;
use Respect\Validation\Validator;

class ProjectController extends Controller
{
    public function create($request, $response)
    {
        $validation = $this->validator->validate($request, [
            'titleProject' => Validator::notEmpty(),
            'descriptionProject' => Validator::notEmpty(),
        ]);

        if ($validation->failed()) {
            $this->flash->addMessage('error', 'Failed create project!');
            return $response->withRedirect($this->router->pathFor('dashboard.project'));
        }

        $all_post_vars = $request->getParsedBody();
        $author = $all_post_vars['author'];
        $title = $all_post_vars['titleProject'];
        $slug =  Controller::getSlug($title);
        $description = $all_post_vars['descriptionProject'];
        $categories = $all_post_vars['categoryProject'];
        $tags = $all_post_vars['tagProject'];
        // $tags = explode(",", str_replace(array('[',']'), '', $all_post_vars['tagProject']));
        $github = $all_post_vars['githubLinkProject'];
        $web = $all_post_vars['webLinkProject'];
        $play_store = $all_post_vars['playStoreLinkProject'];
        $app_store = $all_post_vars['appStoreLinkProject'];
        $guide = $all_post_vars['userGuideLinkProject'];
        $status = $all_post_vars['statusProject'];

        // if not from gallery
        $directory = $this->img_directory;
        $uploaded_image = $request->getUploadedFiles();
        $image_file = $uploaded_image['projectLogo'];

        if ($image_file->getError() === UPLOAD_ERR_OK) {
            $image = Controller::moveUploadedFile($directory, $image_file);
        }

        $data = [
            'name' => $image['name'],
            'folder' => $directory,
            'ext' => $image['ext'],
        ];

        $gallery = Gallery::create($data);
        // if not from gallery

        $data = [
            'author' => $author,
            'title' => $title,
            'slug' => $slug,
            'desc' => $description,
            // 'image' => $image['name'],
            'status' => $status,
            'link_store_google' => $play_store ?: null,
            'link_store_apple' => $app_store ?: null,
            'link_url_web' => $web ?: null,
            'link_github' => $github ?: null,
            'user_guide' => $guide ?: null,
        ];

        $project = Project::create($data);

        if (!$project) {
            $this->flash->addMessage('error', 'Failed create project!');
            return $response->withRedirect($this->router->pathFor('dashboard.project'));
        }

        foreach ($categories as $category) {
            $project->category()->attach($category);
        }

        foreach ($tags as $tag) {
            $project->tag()->attach($tag);
        }

        $project->gallery()->attach($gallery->id);

        $this->flash->addMessage('info', 'project created!');
        return $response->withRedirect($this->router->pathFor('dashboard.project'));
    }

    public function update($request, $response)
    {

    }

    public function delete($request, $response)
    {
        $id = $request->getParam('id');
        $project = Project::where('id', $id)->delete();

        if (!$project) {
            $this->flash->addMessage('error', 'Failed delete project!');
            return $response->withRedirect($this->router->pathFor('dashboard.project'));
        }

        $this->flash->addMessage('info', 'project deleted!');
        return $response->withRedirect($this->router->pathFor('dashboard.project'));
    }

    public function mark($request, $response)
    {
        $id = $request->getParam('id');
        $status_passed = $request->getParam('status');

        if ($status_passed == "publish") {
            $status = 1;
        } else if ($status_passed == "hot") {
            $status = 2;
        } else {
            $status = 0;
        }

        $project = Project::where('id', $id)->update(['status' => $status]);

        if (!$project) {
            $this->flash->addMessage('error', 'Failed mark project!');
            return $response->withRedirect($this->router->pathFor('dashboard.project'));
        }

        $this->flash->addMessage('info', 'project marked!');
        return $response->withRedirect($this->router->pathFor('dashboard.project'));
    }

}