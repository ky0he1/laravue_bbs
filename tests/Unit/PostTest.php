<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->get('api/posts');

        $response->assertStatus(200);
    }
}
