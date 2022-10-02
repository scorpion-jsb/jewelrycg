<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurrentRate extends Model
{
    protected $fillable = [
        'base', 'USD', 'unit', 'XAG', 'XAU',
        'XPT', '24k', '22k', '18k', '14k',
        '10k', 'silver_gram', 'platinum_gram'
    ];
}
