<?php

namespace App;

use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;
use Google_Client;
use Google_Service_Oauth2;
use Illuminate\Database\Eloquent\Model;


class Social extends Model{

    protected $guarded=[];



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

    public function facebookInstance(){

        try {
            $fb = new Facebook([
                'app_id' => config('services.facebook.client_id'),
                'app_secret' => config('services.facebook.client_secret'),
                'default_graph_version' => 'v2.10',
            ]);
            return $fb;
        } catch (FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
    }

    public function googleAccountInfo(){

        $client =  $this->createClient();
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $client->setAccessToken($token['access_token']);
        // get profile info
        $google_oauth = new Google_Service_Oauth2($client);

        $google_account_info = $google_oauth->userinfo->get();


        $googleDetails = [
             'email' => $google_account_info->email,
            'name' =>  $google_account_info->name,
            'image' => $google_account_info->picture,
            'id' =>  $google_account_info->id
        ];
        return $googleDetails;
    }

    public function facebookAccountInfo( $request){

        try {
            $fb = $this->facebookInstance();
            $helper = $fb->getRedirectLoginHelper();
            if ($request['state']) {
                $helper->getPersistentDataHandler()->set('state', $request['state']);
            }
            $accessToken = $helper->getAccessToken();

            if (!$accessToken) {
                echo "No access Token";
                exit();
            }
            $response = $fb->get('/me?fields=name,email,picture.width(200).height(200) ', $accessToken);
            $me = $response->getGraphUser();

            $facebookDetails = [
                'email' => $me->getEmail(),
                'name' =>  $me->getName(),
                'image' => $me->getPicture()['url'],
                'id' => $me->getId()
            ];

            return $facebookDetails;

        } catch (FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;

        }
    }
}
