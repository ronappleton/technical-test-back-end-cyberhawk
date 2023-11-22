<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Services\TurbineService;
use Database\Seeders\DemoDataSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TurbineServiceTest extends TestCase
{
    use RefreshDatabase;

    private TurbineService $turbineService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(DemoDataSeeder::class);

        $this->turbineService = app()->make(TurbineService::class);
    }

    public function testFindById(): void
    {
        $turbine = $this->turbineService->findById(1);

        $this->assertNotNull($turbine);
        $this->assertEquals(1, $turbine->id);
    }

    public function testAll(): void
    {
        $turbines = $this->turbineService->all();

        $this->assertNotNull($turbines);
        $this->assertEquals(100, $turbines->count());
    }
}
