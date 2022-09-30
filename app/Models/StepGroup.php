<?php

namespace App\Models;

use App\Models\Traits\FormatPrices;
use Illuminate\Database\Eloquent\Model;

class StepGroup extends Model
{
    use FormatPrices;

    protected $fillable = [
        'name', 'description'
    ];
}
