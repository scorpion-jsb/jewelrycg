<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseLesson extends Model
{
    use HasFactory;
    /**
     * Get the course that owns the lession.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }    
    /**
     * Get content associate with lesson
     */
    public function contents(){
        $this->hasMany(CourseLessonContent::class, 'lesson_id');
    }    
}
