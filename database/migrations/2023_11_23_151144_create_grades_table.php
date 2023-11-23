<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inspection_id');
            $table->unsignedBigInteger('component_id');
            $table->unsignedBigInteger('grade_type_id');
            $table->timestamps();

            $table->foreign('inspection_id')
                ->references('id')
                ->on('inspections')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('component_id')
                ->references('id')
                ->on('components')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('grade_type_id')
                ->references('id')
                ->on('grade_types')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
