<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Setting;

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
        $mt_status = $allPostVars['mt_status']; // nilai null dng "on"

        $setting = Setting::where('id', 1)
                            ->update([
                                'facebook' => $facebook,
                                'twitter' => $twitter,
                                'linkedin' => $linkedin,
                                'github' => $github,
                                'email' => $email,
                                'phone' => $phone,
                                'address' => $address,
                                'site_url' => $site_url,
                                'site_name' => $site_name,
                                'site_description' => $site_desc,
                                'site_email' => $site_email,
                                'status' => $mt_status ? 1 : 0
                            ]);

        if (!$setting) {
            $this->flash->addMessage('error', 'Failed updated settings!');
            return $response->withRedirect($this->router->pathFor('dashboard.home'));
        }

        $this->flash->addMessage('info', 'Success update settings!');
        return $response->withRedirect($this->router->pathFor('dashboard.home'));

    }

}