<?php

declare(strict_types=1);

namespace Tests\Feature;

use Database\Seeders\DemoDataSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Kirschbaum\OpenApiValidator\ValidatesOpenApiSpec;
use Tests\TestCase;

class ComponentControllerTest extends TestCase
{
    use RefreshDatabase;
    use ValidatesOpenApiSpec;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(DemoDataSeeder::class);
    }

    public function testIndex(): void
    {
        $response = $this->get('/api/components');
        $response->assertOk();
        $response->assertJsonStructure([
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

    public function testShow(): void
    {
        $response = $this->get('/api/components/1');
        $response->assertOk();
        $response->assertJsonStructure(
            [
                'id',
                'component_type_id',
                'turbine_id',
                'created_at',
                'updated_at',
            ]
        );
    }

    public function testGrades(): void
    {
        $response = $this->get('/api/components/1/grades');
        $response->assertOk();
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'component_id',
                    'grade_type_id',
                    'created_at',
                    'updated_at',
                ],
            ],
        ]);
    }

    public function testGrade(): void
    {
        $response = $this->get('/api/components/1/grades/1');
        $response->assertOk();
        $response->assertJsonStructure(
            [
                'id',
                'component_id',
                'grade_type_id',
                'created_at',
                'updated_at',
            ]
        );
    }
}
