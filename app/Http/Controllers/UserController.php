<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Student;
use App\Models\Tutor;
use App\Models\Course;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::orderBy('name', 'ASC')->paginate(10);
        return view('users.homeUser', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $roles = Role::all();
        $users = User::all();
        return view('users.createUser', compact('roles', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'roles' => 'required|string'
        ]);

        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
            return back()->withErrors([
                'email' => 'Este correo electrónico ya está registrado',
            ]);
        }

        $coursesCount = Course::count();

        if ($coursesCount == 0) {
            return back()->withErrors([
                'No se puede crear un estudiante sin un curso disponible',
            ]);
        }

        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);

        // Acceder a la matriz de roles seleccionados
        $roles = $request->roles;
        // Obtiene el primer curso
        $course = Course::first();
        // Verificar si se ha seleccionado el rol de estudiante
        if ($roles == 'student') {
            // Crea el registro del estudiante con user_id establecido automáticamente
            $estudiante = Student::create([
                'name' => $request->name, 
                'email' => $request->email, 
                'user_id' => $user->id, // Establecer user_id al ID del usuario recién creado
                'course_id' => $course->id, // Establecer course_id al ID del primer curso disponible
            ]);
        }
        // Verificar si se ha seleccionado el rol de estudiante
        if ($roles == 'tutor') {
            // Crea el registro del tutor con user_id establecido automáticamente
            $tutor = Tutor::create([
                'name' => $request->name, 
                'email' => $request->email, 
                'user_id' => $user->id, // Establecer user_id al ID del usuario recién creado
            ]);
        }


        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = $file->getClientOriginalName();
            $file->storeAs('image', $filename, 'public'); // Cambia 'avatar' a 'image'
        
            $user->avatar = $filename;
        
            $user->save();
        } else {
            // Establecer el avatar a un valor por defecto si no se ha subido ningún archivo
            $user->avatar = 'image/Avatar.png';
            $user->save();
        }

        $roles = Role::where('name', $request->roles)->get()->pluck('id');
        $user->roles()->attach($roles);

        return redirect()->route('welcome.index')->with('success', 'Usuario creado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $user = User::find($id);
        // Verifica si el estudiante existe
        if (!$user) {
            abort(404); // Puedes personalizar el mensaje de error según tus necesidades
        }

        // Verifica si el usuario autenticado tiene permiso para editar este estudiante o si es un administrador
        if ($user->user_id !== auth()->id() && !auth()->user()->hasRole('admin')) {
            abort(403, 'No tienes permiso para editar este estudiante.'); // Acceso prohibido
        }
        $user = User::find($id);
        return view('users.editUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Encuentra al usuario por su ID
        $user = User::find($id);

        // Validación de los datos recibidos
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'roles' => 'required|string'
        ]);

        // Actualiza los datos del usuario excepto el avatar
        $user->update($request->except('avatar'));

        // Si se ha subido una imagen
        if ($request->hasFile('avatar')) {
            // Guarda la imagen en la carpeta storage/app/public
            $file = $request->file('avatar');
            $filename = $file->getClientOriginalName();
            $file->storeAs('avatar', $filename, 'public');

            $user->avatar = $filename;
            $user->save();
        }

        // Control del rol del usuario
        $roleName = $request->roles;

        // Verificar si el usuario cambió de estudiante a tutor o viceversa
        if ($user->student && $roleName == 'tutor') {
            // Cambio de estudiante a tutor
            $user->student->delete();
            $tutor = Tutor::create([
                'name' => $user->name,
                'email' => $user->email,
                'user_id' => $user->id,
            ]);
        } elseif ($user->tutor && $roleName == 'student') {
            // Cambio de tutor a estudiante
            $user->tutor->delete();
            $student = Student::create([
                'name' => $user->name,
                'email' => $user->email,
                'user_id' => $user->id,
                'course_id' => 1, // Establecer el valor predeterminado del curso
            ]);
        }

        // Actualizar los roles del usuario
        $role = Role::where('name', $roleName)->first();
        if ($role) {
            $user->roles()->sync($role->id);
        }

        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente!');
    }

    public function formDestroy(User $user)
    {
        return view('users.deleteUser', compact('user'));
    }

    public function changePassword()
{
    return view('users.change-password');
}

public function changePasswordSave(Request $request)
{
    $request->validate([
        'current_password' => ['required', 'string'],
        'new_password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    $user = Auth::user();

    if (!$user->password) {
        return back()->withErrors(['current_password' => 'No puedes cambiar la contraseña de una cuenta de Google desde aquí.']);
    }

    if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'La contraseña actual es incorrecta']);
    }

    $user->password = Hash::make($request->new_password);
    $user->save();

    return redirect()->route('welcome.index')->with('success', 'Contraseña cambiada exitosamente!');
}
}
