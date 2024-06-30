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
        Schema::create('random_uploader_tools', function (Blueprint $table) {
            $table->id();
            $table->string('document_name');
            $table->string('sub_type')->nullable();
            $table->date('date');
            $table->text('additional_note')->nullable();
            $table->string('upload_tool');
            
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
        Schema::dropIfExists('random_uploader_tools');
    }
};
