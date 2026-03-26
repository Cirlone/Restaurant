<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomepageTest extends TestCase
{
    public function test_homepage_loads(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    
    public function test_database_connection(): void
    {
        $this->assertTrue(\DB::connection()->getPdo() !== null);
    }
}
