<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentsController extends Controller
{



    public function store(Post $post)
    {

        // Long form
        //Comment::create([

        //    'body' => request('body'),
        //    'post_id' => $post->id

        //]);

        $this->validate(request(), ['body' => 'required|min:2|max:255']);

        // Add a comment to a post (Allow post controller to do this
        $post->addComment(request('body'));

        session()->flash('message', 'Your comment has been posted');

        return back();

    }

}
