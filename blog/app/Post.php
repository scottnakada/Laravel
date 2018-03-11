<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
use Carbon\Carbon;

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

    public function addComment($body)
    {

        // Long form
        Comment::create([

            'body' => $body,
            'post_id' => $this->id,
            'user_id' => auth()->user()->id

        ]);

        // $this->comments()->create(compact('body'));

    }

    public function scopeFilter($query, $filters)
    {

        if (isset($filters['month'])) {

            $query->whereMonth('created_at', Carbon::parse($filters['month'])->month);

        }

        if (isset($filters['year'])) {

            $query->whereYear('created_at', $filters['year']);

        }

        $posts = $query->get();

    }

    public static function archives()
    {

        return static::selectRaw('year(created_at) year,
                                     monthname(created_at) month,
                                     count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();

    }

}
