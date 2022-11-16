<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title', 'content', 'slug'];

    public function posts()  {
        return $this->belongsTo('App\Category');
    }
}
