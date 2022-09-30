<?php

namespace App\Models;

use App\Models\Traits\FormatPrices;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use FormatPrices;

    protected $fillable = [
        'name', 'description', 'link'
    ];
}
