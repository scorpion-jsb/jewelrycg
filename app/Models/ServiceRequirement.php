<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequirement extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'question',
        'type',
        'required',
    ];

    public function choices()
    {
        return $this->hasMany(ServiceRequirementMultichoice::class, 'requirement_id', 'id');
    }
}