<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $courses = Course::orderBy('nombre', 'ASC')->paginate(10);
        return view('courses.homeCourse', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('courses.createCourse');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required',
        ]);

        Course::create($request->all());

        return redirect()->route('courses.index')->with('success', 'Curso creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $course = Course::find($id);
        return view('courses.editCourse', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $request->validate([
            'nombre' => 'required',
        ]);

        Course::find($id)->update($request->all());

        return redirect()->route('courses.index')->with('success', 'Curso actualizado correctamente');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Course::find($id)->delete();
        return redirect()->route('courses.index')->with('success', 'Curso eliminado correctamente');
    }

    public function formDestroy(Course $course)
    {
        return view('courses.deleteCourse', compact('course'));
    }

}
