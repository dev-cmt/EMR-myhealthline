<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseComplaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'case_registry_id',
        'complaint_id',
    ];

}
