<?php

namespace App\Http\Controllers;

use App\Social;
use App\User;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\GraphNodes\GraphUser;
use Illuminate\Http\Request;
use Facebook\Facebook;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class FacebookController extends Controller
{

    public function login()
    {
        $helper = (new Social)->Facebookhelper();


            $permissions = ['email']; // Optional permissions
            $loginUrl = $helper->getLoginUrl(config('services.facebook.redirect'), $permissions);
//            return $loginUrl;

            return redirect($loginUrl);


    }

    public function redirect(Request $request){

        try {
            $fb = new Facebook([
                'app_id' => config('services.facebook.client_id'),
                'app_secret' => config('services.facebook.client_secret'),
                'default_graph_version' => 'v2.10',
            ]);

            $helper = $fb->getRedirectLoginHelper();
            if ($request['state']) {
                $helper->getPersistentDataHandler()->set('state', $request['state']);
            }
            $accessToken = $helper->getAccessToken();

            if (!$accessToken){
                echo "No access Token";
                exit();
            }

            $response = $fb->get('/me?fields=name,email,picture.width(200).height(200) ', $accessToken);
            $me = $response->getGraphUser();

            $name= $me->getName();
            $email = $me->getEmail();
            $picture = $me->getPicture()['url'];
            $id = $me->getId();

            $img = Image::make($picture);


            $mime = $img->mime();
            $contentType = explode('/', $mime);
            $extension = end($contentType);

            $filename = Str::random(7) . '_' . time();
            Storage::disk('public')
                ->put("profile_images/$filename.$extension", $img->encode($extension,80));



            $user = User::where('email', $email)->first();
            if ($user) {
                Auth::login($user);
                return redirect('admin');
            }



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

        } catch (FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

    }






}
