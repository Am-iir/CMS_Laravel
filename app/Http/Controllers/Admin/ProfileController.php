<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function edit(User $user)
    {
        abort_if($user->id !== auth()->id(), 403);

        return view('admin.profile.edit', compact('user'));

    }

    public function update(Request $request, User $user)
    {
        abort_if($user->id !== auth()->id(), 403);

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'password' => 'min:6|confirmed|nullable',
            'profile_image' => 'image|max:1999',
            'password_confirmation' => 'required_with:password'

        ]);


        $user->name = request('name');
        $user->email = request('email');

        if ($request->input('password')){
            $user->password = Hash::make(request('password'));
        }

        if ($request->hasFile('profile_image')) {

            //Get just filename
            $filename = Str::random(16) . '_' . time();
            //Get just extension
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename . '.' . $extension;

            $Imagepath = "profile_images/$filename.$extension";

            $img = Image::make($request->file('profile_image'))
                ->resize(200, 200);

            Storage::disk('public')
                ->put($Imagepath, $img->encode($extension, 80));

            $user->profile_image = $fileNameToStore;
        }

        $user->save();

        return back()
            ->with('success', 'Profile Updated successfully!');


    }

}
