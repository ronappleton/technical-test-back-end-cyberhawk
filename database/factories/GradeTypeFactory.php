<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\GradeType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class GradeTypeFactory extends Factory
{
    protected $model = GradeType::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->colorName(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
