<?php

declare(strict_types=1);

namespace Tests\Feature;

use Database\Seeders\DemoDataSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Kirschbaum\OpenApiValidator\ValidatesOpenApiSpec;
use Tests\TestCase;

class TurbineControllerTest extends TestCase
{
    use RefreshDatabase;
    use ValidatesOpenApiSpec;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(DemoDataSeeder::class);
    }

    public function testGetTurbines(): void
    {
        $this->getJson('/api/turbines')
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
        $this->getJson('/api/turbines/1')
            ->assertOk()
            ->assertJsonStructure([
                'id',
                'name',
                'farm_id',
                'created_at',
                'updated_at',
            ]);
    }
}
