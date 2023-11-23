<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\ComponentType;
use App\Models\Farm;
use App\Models\GradeType;
use App\Models\Inspection;
use App\Models\Turbine;
use Illuminate\Database\Seeder;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        GradeType::factory()->count(5)->create();

        foreach (['Blade', 'Rotor', 'Hub', 'Generator'] as $componentType) {
            ComponentType::factory()->create([
                'name' => $componentType,
            ]);
        }

        Farm::factory()->count(10)
            ->has(Turbine::factory()->count(5)
                ->has(Inspection::factory()->count(3)))
            ->create();


    }
}
