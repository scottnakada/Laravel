<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    // List all fields which can be mass assigned
    protected $fillable = ['post_id', 'body'];

    public function post()
    {

        return $this->belongsTo(Post::class);

    }

    public function user()
    {

        return $this->belongsTo(User::class);

    }

}
