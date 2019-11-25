<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;

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
        return $this->belongsTo(User::class)->withTrashed();
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';


    }

    public function scopeRecentPosts(Builder $query)
    {

        return $query->orderBy('created_at', 'desc')
            ->with(['user', 'tags', 'media', 'categories'])
            ->paginate(3);
    }

    public function scopeFeaturePosts(Builder $query){

        return $query->orderBy('position')
            ->where('featured',1)
            ->with(['user', 'tags', 'media', 'categories'])
            ->take(5)
            ->get();
    }

}
