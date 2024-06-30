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
        Schema::create('sensitive_information', function (Blueprint $table) {
            $table->id();
            $table->enum('sexually_active', ['Yes', 'No', 'Do Not Know', 'Unwilling to Disclose']);
            $table->enum('diabetic', ['Yes', 'No', 'Do Not Know', 'Unwilling to Disclose']);
            $table->enum('allergies', ['Yes', 'No', 'Do Not Know', 'Unwilling to Disclose']);
            $table->text('allergy_details')->nullable();
            $table->enum('thyroid', ['Yes', 'No', 'Do Not Know', 'Unwilling to Disclose']);
            $table->text('thyroid_details')->nullable();
            $table->enum('hypertension', ['Yes', 'No', 'Do Not Know', 'Unwilling to Disclose']);
            $table->enum('cholesterol', ['Yes', 'No', 'Do Not Know', 'Unwilling to Disclose']);
            $table->text('cholesterol_details')->nullable();
            $table->enum('s_creatinine', ['Yes', 'No', 'Do Not Know', 'Unwilling to Disclose']);
            $table->text('s_creatinine_details')->nullable();
            $table->enum('smoking', ['Yes', 'No', 'Do Not Know', 'Unwilling to Disclose']);
            $table->integer('smoking_quantity')->nullable();
            $table->enum('alcohol_intake', ['Yes', 'No', 'Do Not Know', 'Unwilling to Disclose']);
            $table->string('alcohol_frequency')->nullable();
            $table->enum('drug_abuse_history', ['Yes', 'No', 'Do Not Know', 'Unwilling to Disclose']);
            $table->text('drug_abuse_details')->nullable();

            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensitive_information');
    }
};


