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
    // Cuidado, hay que hacer las validaciones antes (En teoría están)
    {
        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
            // El correo electrónico ya existe, maneja el caso adecuadamente (por ejemplo, muestra un mensaje de error)
            return back()->withErrors([
                'email' => 'Este correo electrónico ya está registrado',
            ]);
        } else {
            // El correo electrónico no existe, crea el nuevo usuario
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Darle un rol al usuario
            $user->assignRole('admin');

            Auth::login($user);
            return redirect(route('students.index'));
        }
    }

    public function login(Request $request)
    // Cuidado, hay que hacer las validaciones antes (En teoría están)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        // dd($credentials, Auth::attempt($credentials)); // Aquí se detendrá la ejecución y se imprimirán las variables

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
