<?php

declare(strict_types=1);

namespace Tests\Feature;

use Database\Seeders\DemoDataSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Kirschbaum\OpenApiValidator\ValidatesOpenApiSpec;
use Tests\TestCase;

class InspectionControllerTest extends TestCase
{
    use RefreshDatabase;
    use ValidatesOpenApiSpec;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(DemoDataSeeder::class);
    }

    public function testGetInspections(): void
    {
        $this->getJson('/api/inspections')
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'turbine_id',
                        'created_at',
                        'updated_at',
                    ],
                ],
            ]);
    }

    public function testGetInspection(): void
    {
        $this->getJson('/api/inspections/1')
            ->assertOk()
            ->assertJsonStructure([
                'id',
                'turbine_id',
                'created_at',
                'updated_at',
            ]);
    }
}
