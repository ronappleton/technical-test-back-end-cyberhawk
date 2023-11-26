<?php

declare(strict_types=1);

namespace Tests\Feature\Policies;

use App\Models\User;
use Database\Seeders\DemoDataSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GradePolicyTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(DemoDataSeeder::class);
    }

    public function testViewAnyAdminUserAccessIsSuccessful(): void
    {
        $user = User::find(1);
        $this->actingAs($user);

        $data = $this->getJson('api/grades')
            ->assertStatus(200)
            ->json();

        $this->assertCount(30, $data['data']);
    }

    public function testViewAnyNonInspectionUserAccessFails(): void
    {
        $user = User::find(2);
        $this->actingAs($user);

        $this->getJson('api/grades')
            ->assertStatus(403);
    }

    public function testViewAdminUserAccessIsSuccessful(): void
    {
        $user = User::find(1);
        $this->actingAs($user);

        $this->getJson('api/grades/1')
            ->assertStatus(200)
            ->assertJsonStructure([
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

    public function testViewNonInspectionUserAccessFails(): void
    {
        $user = User::find(2);
        $this->actingAs($user);

        $this->getJson('api/grades/1')
            ->assertStatus(403);
    }
}
