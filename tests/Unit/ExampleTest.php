<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;


use App\Post;

class ExampleTest extends TestCase
{
	use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        //$this->assertTrue(true);

        // Given I have two records in the database that are posts, each one is posted one month apart

    	$first = factory(Post::class)->create();
    	$second = factory(Post::class)->create([

    		      'created_at' => \Carbon\Carbon::now()->subMonth()

    	           ]);

        // When I fetch the archives

    	$posts = Post::archives();
    	//dd($posts);
        // Then the response should be in the proepr format

    	//$this->assertCount(2, $posts);
        $this->assertEquals([

        	[
        		"year" => $first->created_at->format('Y'),
			    "month" => $first->created_at->format('F'),
			    "published" => 1
        	],

        	[
        		"year" => $second->created_at->format('Y'),
			    "month" => $second->created_at->format('F'),
			    "published" => 1
        	]

        ], $posts);
    }
}
