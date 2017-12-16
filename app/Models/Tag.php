<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tags';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * Fillable fields for a Post.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];


    /**
     * Tag Belongs to Post
     *
     * @var array
     */
    public function post()
    {
        return $this->belongsToMany('App\Models\Post','post_tag');
    }

    public function comments()
    {
        return $this->morphMany('\App\Models\Comment', 'commentable');
    }    
}
