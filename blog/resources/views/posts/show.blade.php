@extends ('layouts.master')

@section ('content')

    <div class="col-sm-8 blog-main">

        <h1>{{ $post->title }}</h1>

        @if (count($post->tags))

            <ul>

                @foreach ($post->tags as $tag)

                    <li>

                        <a href="/posts/tags/{{ $tag->name }}">

                            {{ $tag->name }}

                        </a>

                    </li>

                @endforeach

            </ul>

        @endif

        {{ $post->body }}

        <hr>

        <div class="comments">

            <ul class="list-group">

                @foreach ($post->comments as $comment)

                    <li class="list-group-item">

                        <strong>

                            {{ $comment->created_at->diffForHumans() }} &nbsp
                            {{ $comment->user->name }}&nbsp says: &nbsp;

                        </strong>

                        {{ $comment->body }}

                    </li>

                @endforeach

            </ul>

        </div>

        {{-- Add a comment  --}}

        <hr>

        <div class="card">

            <div class="card-block">

                {{-- Only allow adding comments if the user is logged in --}}
                @if (Auth::check())

                    <form method="POST" action="/posts/{{ $post->id }}/comments">

                        @csrf

                        <div class="form-group">

                        <textarea name="body" placeholder="Your comment here."
                                  class="form-control" required>



                        </textarea>

                        </div>

                        <div class="form-group">

                            <button type="submit" class="btn btn-primary">Add Comment</button>

                        </div>

                    </form>

                @else

                    <div class="container">
                        <p>
                            <a href="/login" class="btn btn-primary" role="button">Login</a>
                            <b>Login to add comments!</b>
                        </p>
                        <p>
                            <a href="/register" class="btn btn-primary" role="button">Register</a>
                            <b>Register if you don't have an account.</b>
                        </p>
                    </div>

                @endif


            </div>

        </div>

        @include ('layouts.errors')

    </div>

@endsection