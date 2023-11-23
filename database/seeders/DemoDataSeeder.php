<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Component;
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

        $this->buildTurbines();
    }

    private function buildTurbines(): void
    {
        Turbine::all()->each(function (Turbine $turbine) {
            $rotorType = ComponentType::where('name', 'Rotor')->first();
            $bladeType = ComponentType::where('name', 'Blade')->first();
            $generatorType = ComponentType::where('name', 'Generator')->first();
            $hubType = ComponentType::where('name', 'Hub')->first();

            Component::factory()->create([
                'component_type_id' => $rotorType->id,
                'turbine_id' => $turbine->id,
            ]);

            Component::factory()->count(3)->create([
                'component_type_id' => $bladeType->id,
                'turbine_id' => $turbine->id,
            ]);

            Component::factory()->create([
                'component_type_id' => $generatorType->id,
                'turbine_id' => $turbine->id,
            ]);

            Component::factory()->create([
                'component_type_id' => $hubType->id,
                'turbine_id' => $turbine->id,
            ]);
        });
    }
}
