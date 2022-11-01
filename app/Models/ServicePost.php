<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;


class ServicePost extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        "name",
        "slug",
        "user_id",
        "content",
        "tags_id",
        "categorie_id",
        "thumbnail",
        "gallery",
    ];

    public function storeImages($images)
    {
        $image = Storage::disk('public')->put('service/post', $images); 
        $path = Storage::disk('public')->url('service/post', $images);
        return $path;
    }

    public function tags()
    {
        return $this->hasMany(ServicePostTag::class, 'id_service' , 'id');
    }

    public function categories()
    {
        return $this->hasMany(ServicePostCategorie::class, 'id_post' , 'id');
    }

    public function uploads()
    {
        return $this->belongsTo(Upload::class, 'thumbnail' , 'id')->withDefault([
            'file_name' => "none.png",
            'id' => null
        ]);
    }
    public function postauthor()
    {
        return $this->belongsTo(User::class, 'user_id' , 'id')->withDefault([
            'name' => "Undefined",
        ]);
    }
}
