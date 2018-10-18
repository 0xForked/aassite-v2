<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Message;

use Respect\Validation\Validator;

class SettingController extends Controller
{

    public function update($request, $response)
    {
        $allPostVars = $request->getParsedBody();
        $facebook = $allPostVars['facebook_id'];
        $twitter = $allPostVars['twitter_id'];
        $linkedin = $allPostVars['linkedin_id'];
        $github = $allPostVars['github_id'];
        $email = $allPostVars['email'];
        $phone = $allPostVars['phone'];
        $address = $allPostVars['address'];
        $site_url = $allPostVars['site_url'];
        $site_name = $allPostVars['site_name'];
        $site_desc = $allPostVars['site_description'];
        $site_email = $allPostVars['site_email'];
    }

}