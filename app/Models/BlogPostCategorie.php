<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPostCategorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_post',
        'id_category'
    ] ;
}
