<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Student;
use App\Models\Tutor;

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
            'roles' => 'required|array'
        ]);

        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
            return back()->withErrors([
                'email' => 'Este correo electrónico ya está registrado',
            ]);
        }

        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);

        // Acceder a la matriz de roles seleccionados
        $roles = $request->roles;

        // Verificar si se ha seleccionado el rol de estudiante
        if (in_array('student', $roles)) {
            // Crea el registro del estudiante con user_id establecido automáticamente
            $estudiante = Student::create([
                'name' => $request->name, // Opcional: copiar nombre del usuario para conveniencia
                'email' => $request->email, // Opcional: podría ser redundante pero se incluye para claridad
                'user_id' => $user->id, // Establecer user_id al ID del usuario recién creado
                'course_id' => 1, // Establecer course_id a un valor por defecto
            ]);
        }
        // Verificar si se ha seleccionado el rol de estudiante
        if (in_array('tutor', $roles)) {
            // Crea el registro del tutor con user_id establecido automáticamente
            $tutor = Tutor::create([
                'name' => $request->name, // Opcional: copiar nombre del usuario para conveniencia
                'email' => $request->email, // Opcional: podría ser redundante pero se incluye para claridad
                'user_id' => $user->id, // Establecer user_id al ID del usuario recién creado
            ]);
        }


        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = $file->getClientOriginalName();
            $file->storeAs('avatar', $filename, 'public');

            $user->avatar = $filename;

            $user->save();
        }

        $roles = Role::whereIn('name', $request->roles)->get()->pluck('id');
        $user->roles()->attach($roles);

        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente!');
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
            'roles' => 'required|array'
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
        $roles = Role::whereIn('name', $request->roles)->get()->pluck('name')->toArray();

        // Verificar si el usuario cambió de estudiante a tutor o viceversa
        if ($user->student && in_array('tutor', $roles)) {
            // Cambio de estudiante a tutor
            $user->student->delete();
            $tutor = Tutor::create([
                'name' => $user->name,
                'email' => $user->email,
                'user_id' => $user->id,
            ]);
        } elseif ($user->tutor && in_array('student', $roles)) {
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
        $user->roles()->sync(Role::whereIn('name', $roles)->get());

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
}
