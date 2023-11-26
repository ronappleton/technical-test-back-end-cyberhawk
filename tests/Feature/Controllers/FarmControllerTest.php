<?php

declare(strict_types=1);

namespace Tests\Feature\Controllers;

use App\Models\User;
use Database\Seeders\DemoDataSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Kirschbaum\OpenApiValidator\ValidatesOpenApiSpec;
use Tests\TestCase;

class FarmControllerTest extends TestCase
{
    use RefreshDatabase;
    use ValidatesOpenApiSpec;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(DemoDataSeeder::class);

        $this->actingAs(User::find(1));
    }

    public function testGetFarms(): void
    {
        $this->getJson('/api/farms')
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'created_at',
                        'updated_at',
                    ],
                ],
            ]);
    }

    public function testGetFarm(): void
    {
        $this->markTestSkipped('Due to api spec.');

        $this->getJson('/api/farms/1')
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at',
                ],
            ]);
    }

    public function testGetTurbines(): void
    {
        $this->getJson('/api/farms/1/turbines')
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'farm_id',
                        'created_at',
                        'updated_at',
                    ],
                ],
            ]);
    }

    public function testGetTurbine(): void
    {
        $this->markTestSkipped('Due to api spec.');

        $this->getJson('/api/farms/1/turbines/1')
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'farm_id',
                    'created_at',
                    'updated_at',
                ],
            ]);
    }
}
