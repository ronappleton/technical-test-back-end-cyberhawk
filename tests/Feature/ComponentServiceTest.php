<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Component;
use App\Services\ComponentService;
use Database\Seeders\DemoDataSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ComponentServiceTest extends TestCase
{
    use RefreshDatabase;

    private ComponentService $componentService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(DemoDataSeeder::class);

        $this->componentService = app(ComponentService::class);
    }

    public function testAll(): void
    {
        $components = $this->componentService->all();
        $this->assertInstanceOf(Component::class, $components->first());
        $this->assertCount(300, $components);
    }

    public function testFindById(): void
    {
        $component = $this->componentService->findById(1);
        $this->assertInstanceOf(Component::class, $component);
        $this->assertEquals(1, $component->id);
    }
}
