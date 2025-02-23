<?php

declare(strict_types=1);

namespace Tests\Feature\Controllers;

use App\Models\User;
use Database\Seeders\DemoDataSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Kirschbaum\OpenApiValidator\ValidatesOpenApiSpec;
use Tests\TestCase;

class GradeControllerTest extends TestCase
{
    use RefreshDatabase;
    use ValidatesOpenApiSpec;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(DemoDataSeeder::class);

        $this->actingAs(User::find(1));
    }

    public function testIndex(): void
    {
        $response = $this->get('/api/grades');
        $response->assertOk();
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'inspection_id',
                    'component_id',
                    'grade_type_id',
                    'created_at',
                    'updated_at',
                ],
            ],
        ]);
    }

    public function testShow(): void
    {
        $this->markTestSkipped('Due to api spec.');

        $response = $this->get('/api/grades/1');
        $response->assertOk();
        $response->assertJsonStructure([
                'data' => [
                    'id',
                    'inspection_id',
                    'component_id',
                    'grade_type_id',
                    'created_at',
                    'updated_at',
                ],
            ]);
    }
}
