<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * Fillable fields for a Comments..
     *
     * @var array
     */
    protected $fillable = [
        'body',
        'user_id',
        'commentable_id',
        'commentable_type',
    ];

    /**
     * The model has polymorpic relationships.
     *
     * @var array
     */
    public function commentable()
    {
      return $this->morphTo();
    }


    /**
     * The model belongs to a user..
     *
     * @var array
     */
    public function user()
    {
    	return $this->belongsTo("App\Models\User");
    }

}
