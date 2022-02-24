<?php

namespace Tests\Feature\Api;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * Test Validation Auth
     *
     * @return void
     */
    public function testValidationAuth()
    {
        $response = $this->postJson('/api/auth/token');

        $response->assertStatus(422);
    }

    /**
     * Test Auth with client fake
     *
     * @return void
     */
    public function testAuthClientFake()
    {
        $payLoad = [
            'email' => 'abcde@a.com',
            'password' => '121212',
            'device_name' => Str::random(10),
        ];

        $response = $this->postJson('/api/auth/token', $payLoad);

        $response->assertStatus(404)
            ->assertExactJson([
                'message' => trans('messages.invalid_credentials'),
            ]);
    }

    /**
     * Test Auth Success
     *
     * @return void
     */
    public function testAuthSuccess()
    {
        $client = factory(Client::class)->create();

        $payLoad = [
            'email' => $client->email,
            'password' => 'password',
            'device_name' => Str::random(10),
        ];

        $response = $this->postJson('/api/auth/token', $payLoad);

        $response->assertStatus(200)
            ->assertJsonStructure(['token']);
    }

}
