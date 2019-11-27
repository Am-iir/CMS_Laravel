<?php

namespace App\Http\Controllers;

use App\User;
use Google_Client;
use Google_Service_Oauth2;
use App\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class GoogleController extends Controller
{
    public function login()
    {
        $client = (new Social)->createClient();
        return redirect($client->createAuthUrl());
    }

    public function redirect()
    {
        $client = (new Social)->createClient();

        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $client->setAccessToken($token['access_token']);

        // get profile info
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();

        $email = $google_account_info->email;
        $name = $google_account_info->name;


        $user = User::where('email', $email)->first();
        if ($user) {
            Auth::login($user);
            return redirect('admin');
        }

        $img = Image::make($google_account_info->picture);
        $mime = $img->mime();
        $contentType = explode('/', $mime);
        $extension = end($contentType);

        $filename = Str::random(7) . '_' . time();
        Storage::disk('public')
            ->put("profile_images/$filename.$extension", $img);

        User::query()
            ->create([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt(str_random(7)),
                'profile_image' => "$filename.$extension"
            ]);
        $user = User::where('email', $email)->first();
        Auth::login($user);
        return redirect('admin');
    }

}
