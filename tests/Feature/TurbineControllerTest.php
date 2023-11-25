<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
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

        $this->actingAs(User::find(1));
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
                'data' => [
                    'id',
                    'name',
                    'farm_id',
                    'created_at',
                    'updated_at',
                ],
            ]);
    }

    public function testGetTurbineInspections(): void
    {
        $this->getJson('/api/turbines/1/inspections')
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

    public function testGetTurbineInspection(): void
    {
        $this->getJson('/api/turbines/1/inspections/1')
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'turbine_id',
                    'created_at',
                    'updated_at',
                ],
            ]);
    }

    public function testGetTurbineComponents(): void
    {
        $this->getJson('/api/turbines/1/components')
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'component_type_id',
                        'turbine_id',
                        'created_at',
                        'updated_at',
                    ],
                ],
            ]);
    }

    public function testGetTurbineComponent(): void
    {
        $this->getJson('/api/turbines/1/components/1')
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'component_type_id',
                    'turbine_id',
                    'created_at',
                    'updated_at',
                ],
            ]);
    }
}
