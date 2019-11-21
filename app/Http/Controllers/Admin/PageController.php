<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Jobs\SendEmailJob;
use App\Mail\Contact;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $this->validate($request, Page::rules($page->slug));

        $array = [
            'title' => request('title'),
            'description' => request('description')
        ];
        $page->update(
            [
                'title' => request('title'),
                'content' => $array
            ]);
        return redirect()->route('admin');
    }

    public function show($slug)
    {
        $page = Page::query()->where('slug', $slug)->first();

        abort_if(!$page ? true : false, 404);

        $slug = $page->slug;

        return view('frontend.' . $slug, compact('page'));

    }

    public function sendMessage(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'content' => 'required',
            'email'=>'required',


        ]);
        $data = $request->all();

        SendEmailJob::dispatch($data);
//        Mail::queue(new Contact($data));
        return redirect()->back();
    }
}
