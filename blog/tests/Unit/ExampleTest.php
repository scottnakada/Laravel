<?php

namespace Tests\Unit;

use App\Post;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{

    /* Runs any SQL as a transaction, then undoes transaction at the end;
        so no net change to the database */
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {

        // Given I have two records in the database that are posts.
        // and each one is posted a month apart.

        /* Create a new post, posted this month */
        $first = factory(Post::class)->create();

        /* Create a second post a month ago */
        $second = factory(Post::class)->create([
            'created_at' => \Carbon\Carbon::now()->subMonth()
        ]);

        // When I fetch the archives.
        $posts = Post::archives();

        // Then the response should be in the proper format.
        /* There should only be 2 posts */
        //$this->assertCount(2, $posts);

        $this->assertEquals([
            [
                "year"  => $first->created_at->format('Y'),
                "month" => $first->created_at->format('F'),
                "published" => 1
            ],
            [
                "year"  => $second->created_at->format('Y'),
                "month" => $second->created_at->format('F'),
                "published" => 1
            ],
        ], $posts);

    }
}
