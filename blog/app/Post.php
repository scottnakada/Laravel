<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    // List all fields which can be mass assigned
    protected $fillable = ['title', 'body'];

    public function comments()
    {

        return $this->hasMany(Comment::class);

    }

}
