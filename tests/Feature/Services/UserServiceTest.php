<?php

declare(strict_types=1);

namespace Tests\Feature\Services;

use App\Models\User;
use App\Services\UserService;
use Database\Seeders\DemoDataSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    use RefreshDatabase;

    private UserService $userService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(DemoDataSeeder::class);

        $this->userService = app()->make(UserService::class);

        $this->actingAs(User::find(1));
    }

    public function testFindById(): void
    {
        $user = $this->userService->findById(1);
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals(1, $user->id);
    }

    public function testAll(): void
    {
        $users = $this->userService->all();
        $this->assertInstanceOf(User::class, $users->first());
        $this->assertEquals(2, $users->count());
    }

    public function testFindByUsername(): void
    {
        $user = $this->userService->findByUsername('admin');
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('admin', $user->username);
    }
}
