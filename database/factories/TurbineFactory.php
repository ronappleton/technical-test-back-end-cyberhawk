<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Turbine;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TurbineFactory extends Factory
{
    protected $model = Turbine::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'farm_id' => $this->faker->randomNumber(),
            'lat' => $this->faker->latitude(),
            'lng' => $this->faker->longitude(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
