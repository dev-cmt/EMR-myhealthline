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
        Schema::create('vaccination_covids', function (Blueprint $table) {
            $table->id();
            $table->string('dose_type'); // E.g., Dose 01, Dose 02, Dose 03, Booster
            $table->string('location');
            $table->date('date');
            $table->string('manufacturer');
            
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaccination_covids');
    }
};
