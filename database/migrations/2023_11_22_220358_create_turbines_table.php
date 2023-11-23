<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('turbines', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->unsignedBigInteger('farm_id');
            $table->float('lat', 10, 8)->comment('Accurate to 1mm');
            $table->float('lng', 11, 8)->comment('Accurate to 1mm');
            $table->timestamps();

            $table->foreign('farm_id')
                ->references('id')
                ->on('farms')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('turbines');
    }
};
