<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Information\CaseRegistry;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function cases()
    {
        return $this->belongsToMany(CaseRegistry::class, 'case_complaints', 'complaint_id', 'case_registry_id');
    }
}
