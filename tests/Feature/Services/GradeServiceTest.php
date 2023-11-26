<?php

declare(strict_types=1);

namespace Tests\Feature\Services;

use App\Models\Grade;
use App\Services\GradeService;
use Database\Seeders\DemoDataSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GradeServiceTest extends TestCase
{
    use RefreshDatabase;

    private GradeService $gradeService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(DemoDataSeeder::class);

        $this->gradeService = app(GradeService::class);
    }

    public function testGetAll(): void
    {
        $grades = $this->gradeService->all();
        $this->assertInstanceOf(Grade::class, $grades->first());
        $this->assertCount(30, $grades);
    }

    public function testFindById(): void
    {
        $grade = $this->gradeService->findById(1);
        $this->assertInstanceOf(Grade::class, $grade);
        $this->assertEquals(1, $grade->id);
    }
}
