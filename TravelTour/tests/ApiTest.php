<?php

namespace Tests;

use Tests\TestCase;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\Console\Kernel;

class ApiTest extends TestCase
{
    use CreatesApplication;

    /**
     * Test API endpoint returns a successful response
     *
     * @return void
     */
    public function test_api_endpoint_returns_success_response()
    {
        $response = $this->get('/api/endpoint');

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Success']);
    }

    /**
     * Test API endpoint returns an error response
     *
     * @return void
     */
    public function test_api_endpoint_returns_error_response()
    {
        $response = $this->get('/api/endpoint', ['invalid' => 'params']);

        $response->assertStatus(422);
        $response->assertJson(['error' => 'Invalid request']);
    }
}
