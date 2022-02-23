<?php

namespace Tests\Feature\Api;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * Error create new client
     *
     * @return void
     */
    public function testErrorCreateNewClient()
    {
        $payLoad = [
            'name' => 'Client 02',
            'email' => 'client02@a.com',
        ];

        $response = $this->postJson('/api/auth/register', $payLoad);

        $response->assertStatus(422);
            //->assertExactJson([
            //    'message' => 'The given data was invalid.',
            //    'errors' => [
            //        'password' => [trans('validation.required', ['attribute' => 'password'])]
            //    ]
            //]);
    }

    /**
     * Success create new client
     *
     * @return void
     */
    public function testSuccessCreateNewClient()
    {
        $payLoad = [
            'name' => 'Client 02',
            'email' => 'client02@a.com',
            'password' => '123456',
        ];

        $response = $this->postJson('/api/auth/register', $payLoad);

        $response->assertStatus(201)
            ->assertExactJson([
                'data' => [
                    'name' => $payLoad['name'],
                    'email' => $payLoad['email'],
                ]
            ]);
    }

}
