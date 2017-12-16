<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Category extends Model 
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * Fillable fields for a Categories.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * A category has many posts.
     *
     * @return mixed
     */
    public function post()
    {
        return $this->hasMany('App\Models\Post', 'posts');
    }
}

