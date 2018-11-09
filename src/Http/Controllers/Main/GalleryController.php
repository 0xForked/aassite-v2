<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Gallery;

class GalleryController extends Controller
{

    public function add($request, $response)
    {
        $directory = $this->img_directory;
        $uploaded_image = $request->getUploadedFiles();
        $image_file = $uploaded_image['upload_file'];

        if ($image_file->getError() === UPLOAD_ERR_OK) {
            $image = Controller::moveUploadedFile($directory, $image_file);
        }

        $data = [
            'name' => $image['name'],
            'folder' => $directory,
            'ext' => $image['ext'],
        ];

        $gallery = Gallery::create($data);

        if (!$gallery) {
            $this->flash->addMessage('error', 'Failed add gallery!');
            return $response->withRedirect($this->router->pathFor('dashboard.gallery'));
        }

        $this->flash->addMessage('info', 'gallery added!');
        return $response->withRedirect($this->router->pathFor('dashboard.gallery'));
    }

    public function delete($request, $response)
    {
        $id = $request->getParam('id');
        $directory = $this->img_directory;

        $gallery = Gallery::find($id);

        $image_file = $directory . $gallery->name;

        if (file_exists($image_file)) {
            unlink($image_file);
        }

        $delete_image = $gallery->delete();

        if (!$delete_image) {
            $this->flash->addMessage('error', 'Failed delete gallery!');
            return $response->withRedirect($this->router->pathFor('dashboard.gallery'));
        }

        $this->flash->addMessage('info', 'gallery deleted!');
        return $response->withRedirect($this->router->pathFor('dashboard.gallery'));
    }

}