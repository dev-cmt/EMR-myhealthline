<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Information\TreatmentProfile;

class LabTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'mast_test_id', 'type', 'mast_organ_id', 'comments', 'cost', 'lab', 'upload_tool','treatment_profile_id'
    ];

    public function treatmentProfile()
    {
        return $this->belongsTo(TreatmentProfile::class);
    }
}
