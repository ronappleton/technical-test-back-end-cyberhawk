<?php

declare(strict_types=1);

namespace Tests\Feature;

use Database\Seeders\DemoDataSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Kirschbaum\OpenApiValidator\ValidatesOpenApiSpec;
use Tests\TestCase;

class GradeTypeControllerTest extends TestCase
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
        $this->get('/api/grade-types')
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

    public function testShow(): void
    {
        $this->get('/api/grade-types/1')
            ->assertOk()
            ->assertJsonStructure([
                'id',
                'name',
                'created_at',
                'updated_at',
            ]);
    }
}
