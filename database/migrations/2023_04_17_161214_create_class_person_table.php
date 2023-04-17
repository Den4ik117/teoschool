<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('class_person', function (Blueprint $table) {
            $table->foreignId('person_id')->nullable()->constrained('people')->cascadeOnDelete();
            $table->foreignId('class_id')->nullable()->constrained('working_classes')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_person');
    }
};
