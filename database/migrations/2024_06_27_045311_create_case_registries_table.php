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
        Schema::create('case_registries', function (Blueprint $table) {
            $table->id();
            $table->date('date_primary_identification');
            $table->date('date_first_visit');
            $table->string('recurrence');
            $table->integer('duration_before_visit');
            $table->string('area_of_problem');
            $table->string('type_of_ailment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_registries');
    }
};
