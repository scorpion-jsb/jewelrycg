<?php

namespace App\Http\Controllers;

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
        $arrCourses = Course::with('category')->get();

        return view('courses.index', compact(
            'arrCourses'
        ));
    }
}
