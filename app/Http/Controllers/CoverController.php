<?php

namespace App\Http\Controllers;

use App\Models\Cover;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CoverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

        return view('portada', compact('student', 'course', 'companie', 'tutor', 'user', 'avatar', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cover $cover)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cover $cover)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cover $cover)
    {
        //
    }
}
