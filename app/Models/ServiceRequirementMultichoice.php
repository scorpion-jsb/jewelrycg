<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequirementMultichoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'requirement_id',
        'choice',
    ];
}