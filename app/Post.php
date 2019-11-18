<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected  $fillable=['title','description','user_id'];

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function media(){
        return $this->belongsToMany(Media::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
