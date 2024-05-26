<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Company;
use App\Models\Student;
use App\Models\Tutor;
use App\Models\Tracking;

class AdminController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $companiesCount = Company::count();
        $studentsCount = Student::count();
        $tutorsCount = Tutor::count();
        $trackingsCount = Tracking::count();

        return view('admin.index', compact('usersCount', 'companiesCount', 'studentsCount', 'tutorsCount', 'trackingsCount'));
    }
    /**
     * Display the specified resource.
     */
    public function show()
    {
        // $user = auth()->user();
        // if (!$user) {
        //     // Manejar el caso cuando el usuario no está autenticado
        //     return redirect()->back()->with('error', 'Usuario no autenticado');
        // }
    
        // $admin = $user->admin; // Acceder al perfil de administrador del usuario
        // if (!$admin) {
        //     // Manejar el caso cuando no se encuentra el administrador
        //     return redirect()->back()->with('error', 'Admin no encontrado');
        // }
    
        // $avatar = $user->avatar; // Obtener el avatar del usuario
        // $roles = $user->roles;
    
        // return view('admin.cardAdmin', compact('admin', 'user', 'avatar', 'roles'));
    }
}
