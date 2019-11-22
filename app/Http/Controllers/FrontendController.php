<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{
    public function show($slug)
    {
        $page = Page::query()->where('slug', $slug)->first();

        abort_if(!$page ? true : false, 404);

        $slug = $page->slug;

        return view('frontend.' . $slug, compact('page'));

    }

    public function sendMessage(Request $request)
    {
        $validate = Validator:: make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'content' => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json(['error' => $validate->errors()], 422);
        }

        $data = $request->all();

//        SendEmailJob::dispatch($data);
        Mail::queue(new Contact($data));
        return response()->json();
    }
}
