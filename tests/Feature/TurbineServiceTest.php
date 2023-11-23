<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Inspection;
use App\Models\Turbine;
use App\Services\TurbineService;
use Database\Seeders\DemoDataSeeder;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TurbineServiceTest extends TestCase
{
    use RefreshDatabase;

    private TurbineService $turbineService;

    /**
     * @throws BindingResolutionException
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(DemoDataSeeder::class);

        $this->turbineService = app()->make(TurbineService::class);
    }

    public function testFindById(): void
    {
        $turbine = $this->turbineService->findById(1);

        $this->assertInstanceOf(Turbine::class, $turbine);

        $this->assertNotNull($turbine);
        $this->assertEquals(1, $turbine->id);
    }

    public function testAll(): void
    {
        $turbines = $this->turbineService->all();

        $this->assertInstanceOf(Turbine::class, $turbines->first());

        $this->assertNotNull($turbines);
        $this->assertEquals(50, $turbines->count());
    }

    public function testInspections(): void
    {
        $inspections = $this->turbineService->inspections(1);

        $this->assertInstanceOf(Inspection::class, $inspections->first());

        $this->assertNotNull($inspections);
        $this->assertEquals(3, $inspections->count());
    }

    public function testInspection(): void
    {
        $inspection = $this->turbineService->inspection(1, 1);

        $this->assertInstanceOf(Inspection::class, $inspection);

        $this->assertNotNull($inspection);
        $this->assertEquals(1, $inspection->id);
    }
}
