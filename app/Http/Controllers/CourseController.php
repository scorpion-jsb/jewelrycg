<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseCategory;

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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category(CourseCategory $category)
    {
        $arrCourses = Course::where('category_id', $category->id)
            ->with('category')->get();

        return view('courses.category', compact(
            'arrCourses', 'category'
        ));
    }
}
