<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Carbon\Carbon;

class PostsController extends Controller
{

    public function __construct()
    {

        // Ensure all accesses to the Posts controller except index and show
        // are by logged in users
        $this->middleware('auth')->except(['index', 'show']);

    }

    public function index()
    {

        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();

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
        //Post::create(request(['title', 'body']));

        /**
         * Add the user_id field
         */
        //Post::create([
        //    'title' => request('title'),
        //    'body' => request('body'),
        //    'user_id' => auth()->id()   // or auth()->user()->id
        //]);

        // Publish thru function is User
        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

        session()->flash(

            'message', 'Your post has now been published.'

        );

        // And then re-direct to the home page
        return redirect('/');

    }

}
