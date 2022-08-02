<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Upload extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'file_original_name',
        'file_name',
        'file_size',
        'extension',
        'type'
    ];

    public function getFileFullPath() {
        return asset(Config::get('constants.file_upload_path')) . '/' . $this->file_name;
    }

    public function getOriginalFileFullName() {
        return $this->file_original_name . "." . $this->extension;
    }

}
