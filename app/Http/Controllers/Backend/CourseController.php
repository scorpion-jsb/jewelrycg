<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseStoreRequest;
use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arrCategories = CourseCategory::get();

        return view('backend.course.courses.create', compact(
            'arrCategories'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseStoreRequest $request)
    {
        $data = $request->input();
        $data['user_id'] = Auth::id();
        $data['price'] = Course::stringPriceToCents($request->price);

        $slug = $this->slugify($request->slug);
        if ($request->slug == '') {
            $slug = $this->slugify($request->name);
        }

        if (Course::where('slug', $slug)->count()) {
            $slug .= "-1";
        }
        $data['slug'] = $slug;

        $course_id = Course::create($data)->id;

        return redirect()->route('backend.courses.edit', $course_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $course->setPriceToFloat();
        $arrCategories = CourseCategory::get();

        return view('backend.course.courses.edit', compact(
            'course', 'arrCategories'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}