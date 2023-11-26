<?php

declare(strict_types=1);

namespace Tests\Feature\Services;

use App\Models\Farm;
use App\Models\Turbine;
use App\Services\FarmService;
use Database\Seeders\DemoDataSeeder;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FarmServiceTest extends TestCase
{
    use RefreshDatabase;

    private FarmService $farmService;

    /**
     * @throws BindingResolutionException
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(DemoDataSeeder::class);

        $this->farmService = app()->make(FarmService::class);
    }

    public function testFindById(): void
    {
        $farm = $this->farmService->findById(1);
        $this->assertInstanceOf(Farm::class, $farm);
        $this->assertEquals(1, $farm->id);
    }

    public function testAll(): void
    {
        $farms = $this->farmService->all();
        $this->assertInstanceOf(Farm::class, $farms->first());
        $this->assertEquals(1, $farms->count());
    }

    public function testTurbines(): void
    {
        $turbines = $this->farmService->turbines(1);
        $this->assertEquals(5, $turbines->count());
    }

    public function testTurbine(): void
    {
        $turbine = $this->farmService->turbine(1, 1);
        $this->assertInstanceOf(Turbine::class, $turbine);
        $this->assertEquals(1, $turbine->id);
    }
}
