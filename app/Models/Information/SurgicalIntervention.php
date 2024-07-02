<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurgicalIntervention extends Model
{
    use HasFactory;

    protected $fillable = ['intervention', 'due_time', 'details', 'cost', 'patient_id'];
}
