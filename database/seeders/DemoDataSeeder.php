<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Farm;
use App\Models\GradeType;
use App\Models\Inspection;
use App\Models\Turbine;
use Illuminate\Database\Seeder;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        Farm::factory()->count(10)
            ->has(Turbine::factory()->count(5)
                ->has(Inspection::factory()->count(3)))
            ->create();

        GradeType::factory()->count(5)->create();
    }
}
