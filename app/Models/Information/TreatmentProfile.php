<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Information\LabTest;

class TreatmentProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_name', 'designation', 'chamber_address', 'last_visit_date', 
        'fees', 'comments', 'disease_diagnosis', 'prescription', 'patient_id'
    ];

    public function labTests()
    {
        return $this->hasMany(LabTest::class);
    }
}
