<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    /**
     * Get lesson associate with course
     */
    public function lessons(){
        $this->hasMany(CourseLesson::class, 'course_id');
    }
}
