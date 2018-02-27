<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{

    public function index()
    {

        // Retrieve all the records from the database
        $posts = Post::latest()->get();

        // Go to the posts/index view, passing the posts data
        return view('posts.index', compact('posts'));

    }

    public function show(Post $post)
    {

        // Show the posts/show view
        return view('posts.show', compact('post'));

    }


    public function create()
    {

        return view('posts.create');

    }

    public function store()
    {

        $this->validate(request(), [

            'title' => 'required|min:2|max:255',
            'body' => 'required|min:2|max:255'

        ]);

        // DEBUG request data
        //dd(request()->all());

        /*****
         * Method 1
         */
        // Create a new post using the request data
        //$post = new Post;

        //$post->title = request('title');

        //$post->body = request('body');

        // Save it to the database
        //$post->save();

        /**
         * Method 2
         * requires protected $fillable = ['title', 'body'];
         * in Post.php (model), to specify allowable fields
         */
        //Post::create([
        //    'title' => request('title'),
        //    'body' => request('body')
        //]);

        /**
         * Method 3
         */
        Post::create(request(['title', 'body']));

        // And then re-direct to the home page
        return redirect('/');

    }

}
