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
        Schema::create('doctor_appointment_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_appointment_id');
            $table->string('appointment_type');
            $table->dateTime('appointment_datetime');
            $table->decimal('fee', 8, 2)->nullable();
            $table->text('note')->nullable();
            $table->string('star_rating')->nullable();
            $table->text('additional_comments')->nullable();
            $table->timestamps();

            $table->foreign('doctor_appointment_id')->references('id')->on('doctor_appointments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_appointment_details');
    }
};
