<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionsalQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'admitted_following_diagnosis',
        'hospitalization_duration',
        'total_cost_incurred',
        'medication_effectiveness',
        'satisfied_with_treatment',
        'recommend_physician',
        'patient_id',
    ];
}
