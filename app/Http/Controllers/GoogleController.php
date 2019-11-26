<?php

namespace App\Http\Controllers;

use App\User;
use Google_Client;
use Google_Service_Oauth2;
use App\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        User::create(['name' => $name, 'email' => $email, 'password' => bcrypt(str_random(6))]);
        $user = User::where('email', $email)->first();
        Auth::login($user);
        return redirect('admin');
    }

}
