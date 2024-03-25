<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Models\Company;
use App\Models\Tutor;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = Student::orderBy('nombre', 'ASC')->paginate(10);
        return view('students.homeStudent', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('students.createStudent');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'email' => 'required',
            'telefono_movil' => 'required',
            'nota_media' => 'required',
            'subir_cv' => 'nullable',
            'fecha_inicio_fct' => 'nullable',
            'fecha_fin_fct' => 'nullable',
            'direccion_practicas' => 'nullable',
        ]);
        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Estudiante actualizado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $student = Student::find($id);
        $courses = Course::all();
        $companies = Company::all();
        $tutors = Tutor::all();
        return view('students.editStudent', compact('student', 'courses', 'companies', 'tutors'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $student = Student::find($id);
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'email' => 'required',
            'telefono_movil' => 'required',
            'course_id' => 'required',
            'nota_media' => 'required',
            'company_id' => 'required',
            'subir_cv' => 'nullable',
            'fecha_inicio_fct' => 'nullable',
            'fecha_fin_fct' => 'nullable',
            'direccion_practicas' => 'nullable',
            'tutor_id' => 'required',
        ]);
        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Estudiante actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
