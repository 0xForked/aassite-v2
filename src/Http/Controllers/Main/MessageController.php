<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Message;

use Respect\Validation\Validator;

class MessageController extends Controller
{


    public function create()
    {
        // todo
    }

    public function mark($request, $response)
    {
        $id = $request->getParam('id');
        $mark = Message::where('id', $id)->update(['status' => 1]);

        if (!$message) {
            $this->flash->addMessage('error', 'Failed mark Message!');
            return $response->withRedirect($this->router->pathFor('dashboard.message'));
        }

        $this->flash->addMessage('info', 'Message marked!');
        return $response->withRedirect($this->router->pathFor('dashboard.message'));
    }

    public function delete($request, $response)
    {
        $id = $request->getParam('id');
        $message = Message::where('id', $id)->delete();

        if (!$message) {
            $this->flash->addMessage('error', 'Failed delete Message!');
            return $response->withRedirect($this->router->pathFor('dashboard.message'));
        }

        $this->flash->addMessage('info', 'Message deleted!');
        return $response->withRedirect($this->router->pathFor('dashboard.message'));
    }

}