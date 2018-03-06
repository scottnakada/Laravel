<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;

class Post extends Model
{

    // List all fields which can be mass assigned
    protected $fillable = ['title', 'body', 'user_id'];

    public function comments()
    {

        return $this->hasMany(Comment::class);

    }

    public function user()
    {

        return $this->belongsTo(User::class);

    }

    public function addComment( $body )
    {

        // Long form
        //Comment::create([

        //    'body' => $body,
        //    'post_id' => $this->id

        //]);

        $this->comments()->create(compact('body'));

    }
}
