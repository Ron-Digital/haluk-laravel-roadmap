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

    public function register_test()
    {
        $response = $this->post('/register', [
            'name' => 'Some post user_id 123',
            'email' => 'Some post title 123',
            'password' => 'Some post description 123'
        ]);

        $response->assertStatus($response->status(), 200);
    }
}
