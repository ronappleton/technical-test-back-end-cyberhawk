<?php

declare(strict_types=1);

namespace Feature;

use App\Models\Farm;
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

        $this->assertNotNull($farm);
        $this->assertEquals(1, $farm->id);
    }

    public function testAll(): void
    {
        $farms = $this->farmService->all();

        $this->assertInstanceOf(Farm::class, $farms->first());

        $this->assertNotNull($farms);
        $this->assertEquals(10, $farms->count());
    }
}
