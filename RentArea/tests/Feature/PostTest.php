<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPost()
    {
        // Make call to application...
        $this->assertDatabaseHas('posts', [
            'title' => 'Html Post'
        ]);
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
