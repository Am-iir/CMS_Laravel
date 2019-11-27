<?php

namespace App;

use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;
use Google_Client;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    public function createClient(){
        // init configuration
        $clientID = config('services.google.client_id');
        $clientSecret = config('services.google.client_secret');
        $redirectUri = config('services.google.redirect');

// create Client Request to access Google API
        $client = new Google_Client();
        $client->setClientId($clientID);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($redirectUri);
        $client->addScope("email");
        $client->addScope("profile");

        return $client;

    }

    public function Facebookhelper(){

        try {
            $fb = new Facebook([
                'app_id' => config('services.facebook.client_id'),
                'app_secret' => config('services.facebook.client_secret'),
                'default_graph_version' => 'v2.10',
            ]);

            $helper = $fb->getRedirectLoginHelper();
            return $helper;
        } catch (FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }



    }
}
