<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Setting;

use Respect\Validation\Validator;

class SettingController extends Controller
{

    public function update($request, $response)
    {

        $all_post_vars = $request->getParsedBody();
        $facebook = $all_post_vars['facebook_id'];
        $twitter = $all_post_vars['twitter_id'];
        $linkedin = $all_post_vars['linkedin_id'];
        $github = $all_post_vars['github_id'];
        $email = $all_post_vars['email'];
        $phone = $all_post_vars['phone'];
        $address = $all_post_vars['address'];
        $site_url = $all_post_vars['site_url'];
        $site_name = $all_post_vars['site_name'];
        $site_desc = $all_post_vars['site_description'];
        $site_email = $all_post_vars['site_email'];
        $mt_status = $all_post_vars['mt_status']; // nilai null dng "on"

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