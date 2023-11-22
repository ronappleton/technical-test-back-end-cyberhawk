<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Farm;
use Illuminate\Database\Seeder;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        Farm::factory()->count(10)->create();
    }
}
