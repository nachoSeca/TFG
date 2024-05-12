<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Course;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $companies = Company::orderBy('nombre', 'ASC')->paginate(10);
        return view('companies.homeCompany', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $companies = Company::all();
        $courses = Course::all();
        return view('companies.createCompany', compact('companies', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'nullable',
            'codigo_postal' => 'required',
            'municipio' => 'required',
            'localidad' => 'required',
            'provincia' => 'required',
            'web' => 'nullable',
            'nombre_contacto' => 'required',
            'apellido_contacto' => 'required',
            'email_contacto' => 'required',
            'telefono_fijo' => 'nullable',
            'telefono_movil' => 'required',
            'fecha_ultimo_contacto' => 'nullable',
            'plazas_disponibles' => 'required',
            'observaciones' => 'nullable',
            'course_id' => 'required',

        ]);

        Company::create($request->all());

        return redirect()->route('companies.index')->with('success', 'Empresa creada exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $company = Company::find($id);
        // Verifica si el estudiante existe
        if (!$company) {
            abort(404); // Puedes personalizar el mensaje de error según tus necesidades
        }

        // Verifica si el usuario autenticado tiene permiso para editar este estudiante o si es un administrador
        if ($company->user_id !== auth()->id() && !auth()->user()->hasRole('admin')) {
            abort(403, 'No tienes permiso para editar este estudiante.'); // Acceso prohibido
        }
        //
        $courses = Course::all();
        $company = Company::find($id);
        return view('companies.editCompany', compact('company', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        // Encuntra a la empresa por su id
        $company = Company::find($id);

        // Valida los campos
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'nullable',
            'codigo_postal' => 'required',
            'municipio' => 'required',
            'localidad' => 'required',
            'provincia' => 'required',
            'web' => 'nullable',
            'nombre_contacto' => 'required',
            'apellido_contacto' => 'required',
            'email_contacto' => 'required',
            'telefono_fijo' => 'nullable',
            'telefono_movil' => 'required',
            'fecha_ultimo_contacto' => 'nullable',
            'plazas_disponibles' => 'required',
            'observaciones' => 'nullable',
            'course_id' => 'required',

        ]);

        $company->update($request->all());
        return redirect()->route('companies.index')->with('success', 'Empresa actualizada exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Compañía eliminado exitosamente!');
    }

    public function formDestroy(Company $company)
    {
        return view('companies.deleteCompany', compact('company'));
    }
}
