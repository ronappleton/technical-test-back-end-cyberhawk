<?php

declare(strict_types=1);

namespace Tests\Feature\Controllers;

use App\Models\User;
use Database\Seeders\DemoDataSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Kirschbaum\OpenApiValidator\ValidatesOpenApiSpec;
use Tests\TestCase;

class ComponentTypeControllerTest extends TestCase
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
        $this->get('/api/component-types')
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
        $this->markTestSkipped('Due to api spec.');

        $this->get('/api/component-types/1')
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
}
