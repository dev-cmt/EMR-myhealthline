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
        Schema::create('blood_pressure_profilings', function (Blueprint $table) {
            $table->id();
            $table->time('time');
            $table->integer('systolic');
            $table->integer('diastolic');
            $table->integer('heart_rate_bpm');
            $table->text('additional_note')->nullable();
            
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
        Schema::dropIfExists('blood_pressure_profilings');
    }
};
