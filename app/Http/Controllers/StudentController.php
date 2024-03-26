<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Models\Company;
use App\Models\Tutor;
use App\Models\User;
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
        $courses = Course::all();
        $companies = Company::all();
        $tutors = Tutor::all();
        $users = User::all();

        return view('students.createStudent', compact('courses', 'companies', 'tutors', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'email' => 'required',
            'user_id' => 'required',
            'telefono_movil' => 'required',
            'course_id' => 'required',
            'nota_media' => 'required',
            'company_id' => 'required',
            'subir_cv' => 'nullable|file|mimes:pdf|max:2048',
            'fecha_inicio_fct' => 'nullable',
            'fecha_fin_fct' => 'nullable',
            'direccion_practicas' => 'nullable',
            'tutor_id' => 'required',
        ]);

        // Verifica si se ha subido un archivo
        if ($request->hasFile('subir_cv')) {
            // Obtiene el nombre del archivo
            $nombreArchivo = $request->file('subir_cv')->getClientOriginalName();

            // Guarda el archivo en el almacenamiento (generalmente en storage/app/public)
            $rutaArchivo = $request->file('subir_cv')->storeAs('public/cvs', $nombreArchivo);

            // Agrega la ruta del archivo al array de datos del estudiante
            $datosEstudiante = $request->all();
            $datosEstudiante['subir_cv'] = 'cvs/' . $nombreArchivo;
        } else {
            // Si no se ha subido ningún archivo, deja el campo subir_cv como NULL
            $datosEstudiante = $request->except('subir_cv');
        }

        // Crea el estudiante con los datos proporcionados
        Student::create($datosEstudiante);

        return redirect()->route('students.index')->with('success', 'Estudiante creado exitosamente!');
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
        // Encuentra al estudiante por su ID
        $student = Student::find($id);

        // Validación de los datos recibidos
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'email' => 'required',
            'telefono_movil' => 'required',
            'course_id' => 'required',
            'nota_media' => 'nullable',
            'company_id' => 'nullable',
            'subir_cv' => 'nullable|file|mimes:pdf|max:2048',
            'fecha_inicio_fct' => 'nullable',
            'fecha_fin_fct' => 'nullable',
            'direccion_practicas' => 'nullable',
            'tutor_id' => 'nullable',
        ]);

        // Verifica si se ha subido un nuevo archivo
        if ($request->hasFile('subir_cv')) {
            // Obtiene el nombre del archivo
            $nombreArchivo = $request->file('subir_cv')->getClientOriginalName();

            // Guarda el archivo en el almacenamiento (generalmente en storage/app/public)
            $rutaArchivo = $request->file('subir_cv')->storeAs('public/cvs', $nombreArchivo);

            // Actualiza la ruta del archivo en los datos del estudiante
            $datosEstudiante = $request->all();
            $datosEstudiante['subir_cv'] = 'cvs/' . $nombreArchivo;

            // Actualiza el estudiante con los datos modificados
            $student->update($datosEstudiante);
        } else {
            // Si no se ha subido ningún archivo, deja el campo subir_cv como NULL
            $student->update($request->except('subir_cv'));
        }

        // Redirecciona a la página de índice de estudiantes con un mensaje de éxito
        return redirect()->route('students.index')->with('success', 'Estudiante actualizado exitosamente!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Estudiante eliminado exitosamente!');
    }

    public function formDestroy(Student $student)
    {
        return view('students.deleteStudent', compact('student'));
    }
}
