<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "slug",
        "cover_image",
        "post",
        "tags_id",
        "categorie_id",
    ];

    public function storeImages($images)
    {
        $image = Storage::disk('public')->put('blog/post', $images); 
        $path = Storage::disk('public')->url('blog/post', $images);
        return $path;
    }

    public function tags()
    {
        return $this->hasMany(BlogPostTag::class, 'id_post' , 'id');
    }
}
