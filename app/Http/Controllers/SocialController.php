<?php

namespace App\Http\Controllers;

use App\Social;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SocialController extends Controller
{
    public function login($type)
    {
        if ($type == 'facebook') {
            $fb = (new Social)->facebookInstance();
            $permissions = ['email']; // Optional permissions
            $helper = $fb->getRedirectLoginHelper();
            $loginUrl = $helper->getLoginUrl(config('services.facebook.redirect'), $permissions);
            return redirect($loginUrl);
        } else {
            if ($type == 'google') {
                $client = (new Social)->createClient();
                return redirect($client->createAuthUrl());
            } else {
                return abort(404);
            }
        }
    }

    public function redirect(Request $request, $type)
    {

        if ($type == 'google') {
            $googleDetails = (new  Social)->googleAccountInfo();
            $email = $googleDetails['email'];
            $name = $googleDetails['name'];
            $image = $googleDetails['image'];
            $social_id = $googleDetails['id'];


        } elseif ($type == 'facebook') {

            $facebookDetails = (new  Social)->facebookAccountInfo($request);


            $email = $facebookDetails['email'];
            $name = $facebookDetails['name'];
            $image = $facebookDetails['image'];
            $social_id = $facebookDetails['id'];


        } else {
            return abort(404);
        }

        $user = User::where('email', $email)
            ->first();

        $social = Social::where('social_id',$social_id )->first();

        if (!$social){
            Social::query()->create([
                'user_id' => $user->id,
                'type' => $type,
                'social_id' => $social_id
            ]);
        }

        if ($user) {
            Auth::login($user);
            return redirect('admin');
        }

        $img = Image::make($image);
        $mime = $img->mime();
        $contentType = explode('/', $mime);
        $extension = end($contentType);

        $filename = Str::random(7) . '_' . time();
        Storage::disk('public')
            ->put("profile_images/$filename.$extension", $img->encode($extension, 80));

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
