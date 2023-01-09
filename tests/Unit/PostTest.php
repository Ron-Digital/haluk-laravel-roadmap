<?php

namespace Tests\Unit;

use Tests\TestCase;

class PostTest extends TestCase
{
    // /**
    //  * A basic unit test example.
    //  *
    //  * @return void
    //  */
    // public function test_example()
    // {
    //     $this->assertTrue(true);
    // }

    public function store()
    {
        $response = $this->call('POST', 'PostController\Store', [
            'user_id' => 'Some post user_id 123',
            'title' => 'Some post title 123',
            'description' => 'Some post description 123'
        ]);

        $response->assertStatus($response->status(), 200);
    }
}
