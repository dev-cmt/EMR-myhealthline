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
        Schema::create('lab_tests', function (Blueprint $table) {
            $table->id();
            $table->string('test_name')->nullable();
            $table->string('type')->nullable();
            $table->string('organ')->nullable();
            $table->text('comments')->nullable();
            $table->decimal('cost', 8, 2)->nullable();
            $table->string('lab')->nullable();

            $table->unsignedBigInteger('treatment_profile_id');
            $table->foreign('treatment_profile_id')->references('id')->on('treatment_profiles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab_tests');
    }
};
