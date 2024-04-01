<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TrackingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\LoginController;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
});

// Rutas para el login 
Route::view('/login', 'login/login')->name('login');
Route::view('/registro', 'login/register')->name('registro');
Route::view('/privada', 'secret')->middleware('auth')->name('privada');


Route::post('/validar-registro', [LoginController::class, 'register'])->name('validar-registro');
Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('inicia-sesion');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Rutas para el login con Google

Route::get('/login-google', function () {
    return Socialite::driver('google')->redirect();
})->name('login-google');
 
Route::get('/google-callback', function () {
    $user = Socialite::driver('google')->user();
    

    $userExists = User::where('external_id', $user->id)->where('external_auth', 'google')->first();
    if ($userExists) {
        Auth::login($userExists);
    } else {
        $newUser = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'external_id' => $user->id,
            'external_auth' => 'google',
        ]);
        Auth::login($newUser);
    }

    return redirect('/students');

 
    // $user->token
});

// Fin de las rutas para el login con Google

Route::resources([
    'students' => StudentController::class,
    'tutors' => TutorController::class,
    'companies' => CompanyController::class,
    'trackings' => TrackingController::class,
    'courses' => CourseController::class,
    'users' => UserController::class,
    'roles' => RoleController::class,
]);

// Ruta para el login en la aplicación
// Route::view('/login', 'login')->name('login');


// Ruta para eliminar un estudiante con un formulario de confirmación
Route::get('/students/{student}/delete', [StudentController::class, 'formDestroy'])->name('students.delete');
// Ruta para eliminar un tutor con un formulario de confirmación
Route::get('/tutors/{tutor}/delete', [TutorController::class, 'formDestroy'])->name('tutors.delete');
// Ruta para eliminar una empresa con un formulario de confirmación
Route::get('/companies/{company}/delete', [CompanyController::class, 'formDestroy'])->name('companies.delete');
