<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Grade;
use App\Models\Inspection;
use App\Services\InspectionService;
use Database\Seeders\DemoDataSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InspectionServiceTest extends TestCase
{
    use RefreshDatabase;

    private InspectionService $inspectionService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(DemoDataSeeder::class);

        $this->inspectionService = app(InspectionService::class);
    }

    public function testFindById(): void
    {
        $inspection = $this->inspectionService->findById(1);
        $this->assertInstanceOf(Inspection::class, $inspection);
        $this->assertEquals(1, $inspection->id);
    }

    public function testAll(): void
    {
        $inspections = $this->inspectionService->all();
        $this->assertInstanceOf(Inspection::class, $inspections->first());
        $this->assertEquals(5, $inspections->count());
    }

    public function testGrades(): void
    {
        $grades = $this->inspectionService->grades(1);
        $this->assertInstanceOf(Grade::class, $grades->first());
        $this->assertEquals(6, $grades->count());
    }

    public function testGrade(): void
    {
        $grade = $this->inspectionService->grade(1, 1);
        $this->assertInstanceOf(Grade::class, $grade);
        $this->assertEquals(1, $grade->id);
    }
}
