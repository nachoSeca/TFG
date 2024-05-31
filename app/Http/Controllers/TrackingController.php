<?php

namespace App\Http\Controllers;

use App\Models\Tracking;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Tutor;

class TrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trackings = Tracking::orderBy('fecha_seguimiento', 'ASC')->paginate(10);
        return view('trackings.homeTracking', compact('trackings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        $tutors = Tutor::all();

        return view('trackings.createTracking', compact('students', 'tutors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'fecha_seguimiento' => 'required',
            'observaciones' => 'required',
            'pdf_seguimiento' => 'nullable|file|mimes:pdf|max:2048',
            'tutor_id' => 'required',
            'student_id' => 'required',
        ]);

        // Verifica si se ha subido un archivo
        if ($request->hasFile('pdf_seguimiento')) {
            // Obtiene el nombre del archivo
            $nombreArchivo = $request->file('pdf_seguimiento')->getClientOriginalName();

            // Limpia el nombre del archivo
            $nombreArchivo = preg_replace('/[^A-Za-z0-9.\-\']/', '_', $nombreArchivo);
            // Limita el nombre del archivo a 255 caracteres
            $nombreArchivo = substr($nombreArchivo, 0, 255);
            // Guarda el archivo en el almacenamiento (generalmente en storage/app/public)
            $rutaArchivo = $request->file('pdf_seguimiento')->storeAs('public/seguimientos', $nombreArchivo);

            // Agrega la ruta del archivo al array de datos del seguimiento
            $datosSeguimiento = $request->all();
            $datosSeguimiento['pdf_seguimiento'] = 'seguimientos/' . $nombreArchivo;
        } else {
            // Si no se ha subido ningún archivo, deja el campo subir_cv como NULL
            $datosSeguimiento = $request->except('pdf_seguimiento');
        }

        Tracking::create($datosSeguimiento);

        return redirect()->route('trackings.index')->with('success', 'Seguimiento creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tracking $tracking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tracking = Tracking::find($id);
        // Verifica si el estudiante existe
        if (!$tracking) {
            abort(404); // Puedes personalizar el mensaje de error según tus necesidades
        }

        // Verifica si el usuario autenticado tiene permiso para editar este estudiante o si es un administrador
        if ($tracking->user_id !== auth()->id() && !auth()->user()->hasRole('admin')  && !auth()->user()->hasRole('tutor')) {
            abort(403, 'No tienes permiso para editar este estudiante.'); // Acceso prohibido
        }

        $tracking = Tracking::find($id);
        $students = Student::all();
        $tutors = Tutor::all();

        return view('trackings.editTracking', compact('tracking', 'students', 'tutors'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'fecha_seguimiento' => 'required',
            'observaciones' => 'required',
            'pdf_seguimiento' => 'nullable|file|mimes:pdf|max:2048',
            'tutor_id' => 'required',
            'student_id' => 'required',
        ]);

        $tracking = Tracking::find($id);

        // Verifica si se ha subido un archivo
        if ($request->hasFile('pdf_seguimiento')) {
            // Obtiene el nombre del archivo
            $nombreArchivo = $request->file('pdf_seguimiento')->getClientOriginalName();

            // Limpia el nombre del archivo
            $nombreArchivo = preg_replace('/[^A-Za-z0-9.\-\']/', '_', $nombreArchivo);
            // Limita el nombre del archivo a 255 caracteres
            $nombreArchivo = substr($nombreArchivo, 0, 255);
            // Guarda el archivo en el almacenamiento (generalmente en storage/app/public)
            $rutaArchivo = $request->file('pdf_seguimiento')->storeAs('public/seguimientos', $nombreArchivo);

            // Agrega la ruta del archivo al array de datos del seguimiento
            $datosSeguimiento = $request->all();
            $datosSeguimiento['pdf_seguimiento'] = 'seguimientos/' . $nombreArchivo;
        } else {
            // Si no se ha subido ningún archivo, deja el campo subir_cv como NULL
            $datosSeguimiento = $request->except('pdf_seguimiento');
        }

        $tracking->update($datosSeguimiento);

        return redirect()->route('trackings.index')->with('success', 'Seguimiento actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tracking = Tracking::find($id);
        $tracking->delete();
        return redirect()->route('trackings.index')->with('success', 'Seguimiento eliminado exitosamente!');
    }

    public function formDestroy(Tracking $tracking)
    {
        return view('trackings.deleteTracking', compact('tracking'));
    }
}
