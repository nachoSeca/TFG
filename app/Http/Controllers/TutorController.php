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
        $tutors = Tutor::orderBy('nombre', 'ASC')->paginate(10);
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
            'nombre' => 'required',
            'apellidos' => 'required',
            'email' => 'required',
            'user_id' => 'required',
            'telefono_movil' => 'required',
        ]);

        

        Tutor::create($request->all());

        return redirect()->route('tutors.index')->with('success', 'Tutor creado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tutor $tutor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
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
            'nombre' => 'required',
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
