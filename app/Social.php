<?php

namespace App;

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
}
