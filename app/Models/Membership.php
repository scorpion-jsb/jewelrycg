<?php

namespace App\Models;

use App\Models\Traits\FormatPrices;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use FormatPrices;

    protected $fillable = [
        'name', 'slug', 'price', 'included_downloads', 'unlimited_downloads'
    ];

    public function uploads()
    {
        return $this->belongsTo(Upload::class, 'thumbnail' , 'id')->withDefault([
            'file_name' => "none.png",
            'id' => null
        ]);
    }
}
