<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('components', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('component_type_id');
            $table->unsignedBigInteger('turbine_id');
            $table->timestamps();

            $table->foreign('component_type_id')
                ->references('id')
                ->on('component_types')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('turbine_id')
                ->references('id')
                ->on('turbines')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('components');
    }
};
