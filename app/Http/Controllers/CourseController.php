<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('dashboard.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'coursename' => 'required',
            'deskripsi' => 'required',
            'image' => 'image|required|mimes:png,jpg,svg,gif|max:2048'
        ]);

        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $course_img = date('YmHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $course_img);
            $input['image'] = "$course_img";
        }

        Course::create($input);

        return redirect()->route('courses.index')->with(
            'success',
            'Course berhasil ditambahkan'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('dashboard.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('dashboard.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'coursename' => 'string',
            'deskripsi' => 'string',
            // 'image' => 'image|required|mimes:png,jpg,svg,gif|max:2048'
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $course_img = date('YmHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $course_img);
            $input['image'] = "$course_img";
        } else {
            unset($input['image']);
        }

        $course->update($input);
        return redirect()->route('courses.index')->with(
            'success',
            'Course berhasil diupdate'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with(
            'success',
            'Course berhasil diupdate'
        );
    }
}
