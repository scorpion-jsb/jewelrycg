<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    public function uploads()
    {
        return $this->belongsTo(Upload::class, 'thumb', 'id');
    }
}