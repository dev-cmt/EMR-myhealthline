<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Information\Complaint;
use App\Models\User;

class CaseRegistry extends Model
{
    use HasFactory;
    
    protected $table = 'case_registries';

    protected $fillable = [
        'patient_id',
        'date_of_primary_identification',
        'date_of_first_visit',
        'recurrence',
        'duration_of_suffering',
        'area_of_problem',
        'type_of_ailment',
        'additional_complaints',
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function complaints()
    {
        return $this->belongsToMany(Complaint::class, 'case_complaints');
    }
}
