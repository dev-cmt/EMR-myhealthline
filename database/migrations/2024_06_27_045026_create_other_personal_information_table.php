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
        Schema::create('other_personal_information', function (Blueprint $table) {
            $table->id();
            $table->enum('marital_status', ['Single', 'Married', 'Married with Kids', 'Divorced', 'Widowed', 'Unwilling to Disclose'])->nullable();
            $table->string('home_address')->nullable();
            $table->string('office_address')->nullable();
            $table->string('email_address')->nullable();
            $table->string('phone_number')->nullable();
            $table->date('last_blood_donated')->nullable();
            $table->string('health_insurance_number')->nullable();
            $table->string('family_physician')->nullable();
            $table->string('physician_contact')->nullable();
            $table->enum('pregnancy_status', ['Yes', 'No'])->nullable();
            $table->enum('menstrual_cycle', ['Regular', 'Irregular', 'Menopaused'])->nullable();
            $table->enum('activity_status', ['Immobile/Paralyzed', 'Disabled', 'Not Very Active', 'Moderately Active', 'Highly Active'])->nullable();
            $table->text('hereditary_disease')->nullable();

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
        Schema::dropIfExists('other_personal_information');
    }
};
