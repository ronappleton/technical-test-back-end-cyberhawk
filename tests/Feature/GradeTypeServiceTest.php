<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\GradeType;
use App\Services\GradeTypeService;
use Database\Seeders\DemoDataSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GradeTypeServiceTest extends TestCase
{
    use RefreshDatabase;

    private GradeTypeService $service;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(DemoDataSeeder::class);

        $this->service = app()->make(GradeTypeService::class);
    }

    public function testGetAll(): void
    {
        $gradeTypes = $this->service->all();
        $this->assertInstanceOf(GradeType::class, $gradeTypes->first());
        $this->assertCount(5, $gradeTypes);
    }

    public function testGetById(): void
    {
        $gradeType = $this->service->findById(1);
        $this->assertInstanceOf(GradeType::class, $gradeType);
        $this->assertEquals(1, $gradeType->id);
    }

}
