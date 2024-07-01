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
        Schema::create('treatment_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('doctor_name')->nullable();;
            $table->string('designation')->nullable();;
            $table->string('chamber_address')->nullable();;
            $table->date('last_visit_date')->nullable();;
            $table->decimal('fees', 8, 2)->nullable();
            $table->text('comments')->nullable();
            $table->string('disease_diagnosis');
            $table->string('prescription')->nullable();
            
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
        Schema::dropIfExists('treatment_profiles');
    }
};
