<?php

declare(strict_types=1);

namespace Tests\Feature;

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

        $this->userService = app(UserService::class);
    }

    public function testAll(): void
    {
        $users = $this->userService->all();
        $this->assertInstanceOf(User::class, $users->first());
        $this->assertCount(2, $users);
    }

    public function testFindById(): void
    {
        $user = $this->userService->findById(1);
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('admin', $user->username);
    }
}
