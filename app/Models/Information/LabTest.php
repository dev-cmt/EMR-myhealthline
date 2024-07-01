<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Information\TreatmentProfile;

class LabTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'test_name', 'type', 'organ', 'comments', 'cost', 'lab', 'treatment_profile_id'
    ];

    public function treatmentProfile()
    {
        return $this->belongsTo(TreatmentProfile::class);
    }
}
