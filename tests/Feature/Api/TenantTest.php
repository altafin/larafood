<?php

namespace Tests\Feature\Api;

use App\Models\Tenant;
use Tests\TestCase;
use function factory;

class TenantTest extends TestCase
{
    /**
     * Test Get All Tenants
     *
     * @return void
     */
    public function testGetAllTenants()
    {
        factory(Tenant::class, 10)->create();

        $response = $this->getJson('/api/v1/tenants');

        $response->assertStatus(200)
            ->assertJsonCount(10, 'data');
    }

    /**
     * Test Get Error Single Tenant
     *
     * @return void
     */
    public function testErroGetTenant()
    {
        $tenant = 'fake_value';
        $response = $this->getJson("/api/v1/tenants/{$tenant}");

        $response->assertStatus(404);
    }

    /**
     * Test Get Tenant by Identify
     *
     * @return void
     */
    public function testGetTenantByIdentify()
    {
        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/v1/tenants/{$tenant->uuid}");

        $response->assertStatus(200);
    }

}
