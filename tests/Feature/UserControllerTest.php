<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use App\Services\UserService;
use Database\Seeders\DemoDataSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    private UserService $userService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(DemoDataSeeder::class);

        $this->userService = app()->make(UserService::class);

    }

    public function testGetUserAuthenticated(): void
    {
        $user = User::find(1);

        $response = $this->actingAs($user)->getJson('/api/user');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                'username',
                'permissions',
                'created_at',
                'updated_at',
            ],
        ]);
    }

    public function testGetUserUnauthenticated(): void
    {
        $response = $this->getJson('/api/user');
        $response->assertStatus(401);
    }

    public function testAuthorisedUserHasPermissions(): void
    {
        $user = User::find(1);

        $response = $this->actingAs($user)->getJson('/api/user');
        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                'permissions' => [
                    'view inspections',
                    'view grades',
                    'view components',
                    'view turbines',
                    'view farms',
                ],
            ],
        ]);
    }

    public function testNonInspectionUserHasMinimalPermissions(): void
    {
        $user = User::find(2);

        $response = $this->actingAs($user)->getJson('/api/user');
        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                'permissions' => [
                    'view turbines',
                    'view farms',
                ],
            ],
        ]);
    }
}
