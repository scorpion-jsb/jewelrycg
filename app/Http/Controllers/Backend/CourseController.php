<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::with(['category', 'author'])
            ->orderBy('id', 'DESC')->get();

        return view('backend.course.courses.list', compact(
            'courses'
        ));
    }
}
