<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Models\Company;
use App\Models\Tutor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = Student::orderBy('name', 'ASC')->paginate(10);
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
            'name' => 'required',
            'apellidos' => 'required',
            'email' => 'required',
            'user_id' => 'required',
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

        // Verifica si hay al menos un curso disponible
        if (Course::count() == 0) {
            return redirect()->route('students.index')->with('error', 'No hay cursos disponibles. Por favor, crea un curso antes de crear un estudiante.');
        }

        // Crea el estudiante con los datos proporcionados
        Student::create($datosEstudiante);

        return redirect()->route('students.index')->with('success', 'Estudiante creado exitosamente!');
    }


    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = auth()->user();
        if (!$user) {
            // Manejar el caso cuando el usuario no está autenticado
            return redirect()->back()->with('error', 'Usuario no autenticado');
        }

        $student = $user->student; // Acceder al perfil de estudiante del usuario
        if (!$student) {
            // Manejar el caso cuando no se encuentra el estudiante
            return redirect()->back()->with('error', 'Estudiante no encontrado');
        }

        $avatar = $user->avatar; // Obtener el avatar del usuario
        $course = $student->course; // Obtener el curso del estudiante
        $companie = $student->companie; // Obtener la empresa del estudiante
        $tutor = $student->tutor; // Obtener el tutor del estudiante
        $roles = $user->roles;

        return view('students.cardStudent', compact('student', 'course', 'companie', 'tutor', 'user', 'avatar', 'roles'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Encuentra al estudiante por su ID
        $student = Student::find($id);
        // Verifica si el estudiante existe
        if (!$student) {
            abort(404); // Puedes personalizar el mensaje de error según tus necesidades
        }

        // Verifica si el usuario autenticado tiene permiso para editar este estudiante o si es un administrador
        if ($student->user_id !== auth()->id() && !auth()->user()->hasRole('admin')) {
            abort(403, 'No tienes permiso para editar este estudiante.'); // Acceso prohibido
        }
        //
        $student = Student::find($id);
        $courses = Course::all();
        $companies = Company::all();
        $tutors = Tutor::all();
        $users = User::all();
        $avatar = $student->user->avatar; // Obtener el avatar del usuario del estudiante

        return view('students.editStudent', compact('student', 'courses', 'companies', 'tutors', 'users', 'avatar'));
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
            'name' => 'required',
            'apellidos' => 'required',
            'email' => 'required',
            'telefono_movil' => 'required',
            'course_id' => 'nullable',
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
        return redirect()->route('welcome.index', $student->id)->with('success', 'Estudiante actualizado exitosamente!');
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
