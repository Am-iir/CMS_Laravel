<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Media;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $media = Media::orderBy('created_at', 'desc')->paginate(4);
//        $medium =Media::find(8);

        return view('admin.media.index', compact('media'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        return view('admin.media.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'cover_image' => 'image|required|max:1999',
            'alt' => 'required'
        ]);

        if ($request->hasFile('cover_image')) {

            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = Str::random(16) . '_' . time();
            //Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename . '.' . $extension;

            $request->file('cover_image')
                ->storeAs('public/cover_images', $fileNameToStore);

            $sizes = config('images.size');
            foreach ($sizes as $type => $size) {
                [$width, $height] = $size;
                $thumbnailpath = "cover_images/$type/{$filename}_{$type}.$extension";

                $img = Image::make($request->file('cover_image'))
                    ->resize($width, $height, function ($constraint) {
                        $constraint->aspectRatio();

                    });

                Storage::disk('public')
                    ->put($thumbnailpath, $img->encode($extension, 80));
            }
        }

//        dd($request->all());

        $media = new Media;
        $media->alt = $request->input('alt');
        $media->cover_image = $fileNameToStore;
        $media->user_id = auth()->id();
        $media->save();
        return redirect()->route('admin.media.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Media $media
     * @return Response
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Media $medium
     * @return Response
     */
    public function edit(Media $medium)
    {

        return view('admin.media.edit', compact('medium'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Media $medium
     * @return Response
     */
    public function update(Request $request, Media $medium)
    {
//        dd(request()->all());

        if ($request->hasFile('cover_image')) {
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

            $medium->update(['alt' => request('alt'), 'cover_image' => $fileNameToStore]);

        } else {

            $medium->update(request(['alt']));
        }

        return response()->json($medium);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Media $medium
     * @return void
     * @throws \Exception
     */
    public function destroy(Media $medium)
    {
        $medium->delete();
        return response()->json($medium);
    }
}
