<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['title', 'content'];

    protected $casts = [
        'content' => 'array'
    ];


    public static function rules($slug)
    {
        $rules = [
            'about' => [
                'title' => 'required',
                'description' => 'required',
                'sectionTwo' => 'required',
                'sectionThree' => 'required'
            ],
            'contact' => [
                'title' => 'required',
                'description' => 'required'
            ]

        ];

        return $rules[$slug];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


}



