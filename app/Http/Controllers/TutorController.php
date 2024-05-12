<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use App\Models\User;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tutors = Tutor::orderBy('name', 'ASC')->paginate(10);
        return view('tutors.homeTutor', compact('tutors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tutors = Tutor::all();
        $users = User::all();

        return view('tutors.createTutor', compact('tutors', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'apellidos' => 'required',
            'email' => 'required',
            // 'user_id' => 'required',
            'telefono_movil' => 'required',
        ]);



        Tutor::create($request->all());

        return redirect()->route('tutors.index')->with('success', 'Tutor creado exitosamente!');
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
    
        $tutor = $user->tutor; // Acceder al perfil de estudiante del usuario
        if (!$tutor) {
            // Manejar el caso cuando no se encuentra el estudiante
            return redirect()->back()->with('error', 'Estudiante no encontrado');
        }
    
        $avatar = $user->avatar; // Obtener el avatar del usuario
        $roles = $user->roles;
        $trackings = $tutor->trackings()->with('student')->get(); // Obtener los seguimientos del tutor y los estudiantes asociados
    
        return view('tutors.cardTutor', compact('tutor', 'user', 'avatar', 'roles', 'trackings'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Encuentra al estudiante por su ID
        $tutor = Tutor::find($id);
        // Verifica si el estudiante existe
        if (!$tutor) {
            abort(404); // Puedes personalizar el mensaje de error según tus necesidades
        }

        // Verifica si el usuario autenticado tiene permiso para editar este estudiante o si es un administrador
        if ($tutor->user_id !== auth()->id() && !auth()->user()->hasRole('admin')) {
            abort(403, 'No tienes permiso para editar este estudiante.'); // Acceso prohibido
        }
        //
        $users = User::all();
        $tutor = Tutor::find($id);
        return view('tutors.editTutor', compact('tutor', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Encuentra al estudiante por su ID
        $tutor = Tutor::find($id);


        // Validación de los datos recibidos
        $request->validate([
            'name' => 'required',
            'apellidos' => 'required',
            'email' => 'required',
            'user_id' => 'required',
            'telefono_movil' => 'required',
        ]);

        $tutor->update($request->all());
        return redirect()->route('tutors.index')->with('success', 'Tutor actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tutor = Tutor::find($id);
        $tutor->delete();
        return redirect()->route('tutors.index')->with('success', 'Tutor eliminado exitosamente!');
    }

    public function formDestroy(Tutor $tutor)
    {
        return view('tutors.deleteTutor', compact('tutor'));
    }
}
