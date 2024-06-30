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
        Schema::create('blood_sugar_profilings', function (Blueprint $table) {
            $table->id();
            $table->time('time');
            $table->decimal('reading', 5, 2); // Adjust precision and scale as needed
            $table->string('dietary_information');
            $table->string('remark');
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
        Schema::dropIfExists('blood_sugar_profilings');
    }
};
