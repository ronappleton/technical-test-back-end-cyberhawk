<?php

declare(strict_types=1);

namespace Tests\Feature\Services;

use App\Models\ComponentType;
use App\Services\ComponentTypeService;
use Database\Seeders\DemoDataSeeder;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ComponentTypeServiceTest extends TestCase
{
    use RefreshDatabase;

    private ComponentTypeService $service;

    /**
     * @throws BindingResolutionException
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(DemoDataSeeder::class);

        $this->service = app()->make(ComponentTypeService::class);
    }

    public function testGetAll(): void
    {
        $componentTypes = $this->service->all();
        $this->assertInstanceOf(ComponentType::class, $componentTypes->first());
        $this->assertCount(4, $componentTypes);
    }

    public function testFindById(): void
    {
        $componentType = $this->service->findById(1);
        $this->assertInstanceOf(ComponentType::class, $componentType);
        $this->assertEquals(1, $componentType->id);
    }
}
