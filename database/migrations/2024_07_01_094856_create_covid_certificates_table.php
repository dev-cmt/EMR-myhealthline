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
        Schema::create('covid_certificates', function (Blueprint $table) {
            $table->id();
            $table->string('certificate_number')->nullable();
            $table->string('uploader_tool')->nullable();
            
            $table->unsignedBigInteger('vaccination_covid_id');
            $table->foreign('vaccination_covid_id')->references('id')->on('vaccination_covids')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('covid_certificates');
    }
};
