<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ProvinceCityApiTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware; // Gunakan ini jika Anda ingin menonaktifkan middleware saat pengujian

    /**
     * Test untuk endpoint /api/search/provinces
     *
     * @return void
     */
    public function testSearchProvincesEndpoint()
    {
        $response = $this->get('/api/search/provinces');
        $response->assertStatus(200);
    }

    /**
     * Test untuk endpoint /api/search/cities
     *
     * @return void
     */
    public function testSearchCitiesEndpoint()
    {
        $response = $this->get('/api/search/cities');
        $response->assertStatus(200);
    }
}
