<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function register(Request $request)
    {
        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
            // El correo electrónico ya existe, maneja el caso adecuadamente (por ejemplo, muestra un mensaje de error)
            return back()->withErrors([
                'email' => 'Este correo electrónico ya está registrado',
            ]);
        } else {
            // Verifica si ya existe un usuario con el rol de 'admin'
            $existingAdmin = User::role('admin')->first();

            if ($existingAdmin) {
                // Ya existe un usuario con el rol de 'admin', maneja el caso adecuadamente (por ejemplo, muestra un mensaje de error)
                return back()->withErrors([
                    'role' => 'Ya existe un usuario con el rol de administrador',
                ]);
            } else {
                // El correo electrónico no existe y no hay un usuario con el rol de 'admin', crea el nuevo usuario
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'avatar' => 'avatar.png', // Asigna el avatar por defecto

                ]);

                // Darle un rol al usuario
                $user->assignRole('admin');

                Auth::login($user);
                return redirect(route('admin.index'));
            }
        }
    }

    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // Comprobar si el usuario se autenticó mediante Google
        $user = User::where('email', $request->email)->first();
        if ($user && $user->external_id && $user->external_auth === 'google') {
            return back()->withErrors([
                'email' => 'Este correo electrónico está asociado a una cuenta de Google. Por favor, inicia sesión con Google.',
            ]);
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('welcome.index'));
        } else {
            return back()->withErrors([
                'email' => 'Las credenciales no coinciden',
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        // Reseteamos la sesión
        $request->session()->invalidate();
        // Regeneramos el token
        $request->session()->regenerateToken();
        // Redirigimos al login
        return redirect('/');
    }
}
