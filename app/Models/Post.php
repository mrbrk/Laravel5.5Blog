<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Post extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

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
        'title',
        'body',
        'slug',
        'user_id',
        'category_id',
        'image_name',
        'mime',
        'original_filename',
    ];

    /**
     * A post belongs to a user.
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Post belongs to a category.
     *
     * @var array
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    /**
     * Post has many Tags.
     *
     * @var array
     */

    public function tag()
    {
        return $this->belongsToMany('App\Models\Tag','post_tag');
    }

    /**
     * Post has a many comments.
     *
     * @var array
     */
    public function comments()
      {
        return $this->morphMany('App\Models\Comment', 'commentable');
      }
    
    /**
     * Post has a many likes.
     *
     * @var array
     */
    public function likes()
    {
        return $this->morphMany('App\Models\Like', 'likeable');
    }

    public function isLikedByUser()
    {
        $like = $this->likes()->whereUserId(Auth::id())->first();
        return (!is_null($like)) ? true : false;
    }
    


}
