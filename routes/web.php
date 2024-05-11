<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\CoverController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
});



// Rutas para el login 
Route::view('/login', 'login/login')->name('login');
Route::view('/registro', 'login/register')->name('registro');


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
        $newUser->assignRole('admin');

        Auth::login($newUser);
    }
    

    return redirect()->route('admin.index');
    // $user->token
});

// Fin de las rutas para el login con Google

// Route::group(['middleware' => ['role:admin']], function () {
//     Route::resources([
//         'students' => StudentController::class,
//         'tutors' => TutorController::class,
//         'companies' => CompanyController::class,
//         'trackings' => TrackingController::class,
//         'users' => UserController::class,
//     ]);

// Ruta general
// Route::get('/portada', function () {
//     return view('portada');
// })->name('portada');

// Ruta para la portada
Route::get('covers', [CoverController::class, 'index'])->name('covers.index');

Route::get('welcome', function () {
    return view('welcome');
})->name('welcome.index');


// Rutas para StudentController con middleware 'role:admin'
// Route::resource('students', StudentController::class)->middleware('role:student|admin');

//RUTAS ESTUDIANTES CON ROLES
Route::get('students', [StudentController::class, 'index'])->name('students.index')->middleware('role:tutor|admin');
Route::get('students/create', [StudentController::class, 'create'])->name('students.create')->middleware('role:admin|tutor');
Route::post('students', [StudentController::class, 'store'])->name('students.store')->middleware('role:admin|tutor');
Route::get('students/{student}', [StudentController::class, 'show'])->name('students.show')->middleware('role:student');
Route::get('students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit')->middleware('role:admin|tutor|student');
Route::put('students/{student}', [StudentController::class, 'update'])->name('students.update')->middleware('role:admin|tutor|student');
Route::delete('students/{student}', [StudentController::class, 'destroy'])->name('students.destroy')->middleware('role:admin');


// Rutas para TutorController con middleware 'role:tutor'
// Route::resource('tutors', TutorController::class)->middleware('role:tutor|admin');

// Rutas para TutorController
Route::get('tutors', [TutorController::class, 'index'])->name('tutors.index')->middleware('role:admin');
Route::get('tutors/create', [TutorController::class, 'create'])->name('tutors.create')->middleware('role:admin');
Route::post('tutors', [TutorController::class, 'store'])->name('tutors.store')->middleware('role:admin');
Route::get('tutors/{tutor}', [TutorController::class, 'show'])->name('tutors.show')->middleware('role:tutor');
Route::get('tutors/{tutor}/edit', [TutorController::class, 'edit'])->name('tutors.edit')->middleware('role:admin|tutor');
Route::put('tutors/{tutor}', [TutorController::class, 'update'])->name('tutors.update')->middleware('role:admin');
Route::delete('tutors/{tutor}', [TutorController::class, 'destroy'])->name('tutors.destroy')->middleware('role:admin');


// Rutas para CompanyController con middleware 'role:company'
// Route::resource('companies', CompanyController::class)->middleware('role:company|admin');

// Rutas para CompanyController
Route::get('companies', [CompanyController::class, 'index'])->name('companies.index')->middleware('role:admin|tutor');
Route::get('companies/create', [CompanyController::class, 'create'])->name('companies.create')->middleware('role:admin|tutor');
Route::post('companies', [CompanyController::class, 'store'])->name('companies.store')->middleware('role:admin|tutor');
Route::get('companies/{company}', [CompanyController::class, 'show'])->name('companies.show')->middleware('role:admin|tutor');
Route::get('companies/{company}/edit', [CompanyController::class, 'edit'])->name('companies.edit')->middleware('role:admin|tutor');
Route::put('companies/{company}', [CompanyController::class, 'update'])->name('companies.update')->middleware('role:admin|tutor');
Route::delete('companies/{company}', [CompanyController::class, 'destroy'])->name('companies.destroy')->middleware('role:admin|tutor');


// Rutas para TrackingController con middleware 'role:tracking'
// Route::resource('trackings', TrackingController::class)->middleware('role:tutor|admin');

// Rutas para TrackingController
Route::get('trackings', [TrackingController::class, 'index'])->name('trackings.index')->middleware('role:tutor|admin');
Route::get('trackings/create', [TrackingController::class, 'create'])->name('trackings.create')->middleware('role:admin|tutor');
Route::post('trackings', [TrackingController::class, 'store'])->name('trackings.store')->middleware('role:admin|tutor');
Route::get('trackings/{tracking}', [TrackingController::class, 'show'])->name('trackings.show')->middleware('role:tutor|admin');
Route::get('trackings/{tracking}/edit', [TrackingController::class, 'edit'])->name('trackings.edit')->middleware('role:admin|tutor');
Route::put('trackings/{tracking}', [TrackingController::class, 'update'])->name('trackings.update')->middleware('role:admin|tutor');
Route::delete('trackings/{tracking}', [TrackingController::class, 'destroy'])->name('trackings.destroy')->middleware('role:admin|tutor');

// Rutas para UserController con middleware 'role:user'
// Route::resource('users', UserController::class)->middleware('role:admin');

// Rutas para UserController
Route::get('users', [UserController::class, 'index'])->name('users.index')->middleware('role:admin');
Route::get('users/create', [UserController::class, 'create'])->name('users.create')->middleware('role:admin');
Route::post('users', [UserController::class, 'store'])->name('users.store')->middleware('role:admin');
Route::get('users/{user}', [UserController::class, 'show'])->name('users.show')->middleware('role:admin');
Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('role:admin');
Route::put('users/{user}', [UserController::class, 'update'])->name('users.update')->middleware('role:admin');
Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('role:admin');

// Turas para CourseController
Route::get('courses', [CourseController::class, 'index'])->name('courses.index')->middleware('role:admin');
Route::get('courses/create', [CourseController::class, 'create'])->name('courses.create')->middleware('role:admin');
Route::post('courses', [CourseController::class, 'store'])->name('courses.store')->middleware('role:admin');
Route::get('courses/{course}', [CourseController::class, 'show'])->name('courses.show')->middleware('role:admin');
Route::get('courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit')->middleware('role:admin');
Route::put('courses/{course}', [CourseController::class, 'update'])->name('courses.update')->middleware('role:admin');
Route::delete('courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy')->middleware('role:admin');


// Ruta para eliminar un estudiante con un formulario de confirmación
Route::get('/students/{student}/delete', [StudentController::class, 'formDestroy'])->name('students.delete')->middleware('role:admin');

// Ruta para eliminar un tutor con un formulario de confirmación
Route::get('/tutors/{tutor}/delete', [TutorController::class, 'formDestroy'])->name('tutors.delete')->middleware('role:admin');

// Ruta para eliminar una empresa con un formulario de confirmación
Route::get('/companies/{company}/delete', [CompanyController::class, 'formDestroy'])->name('companies.delete')->middleware('role:admin');

// Ruta para eliminar un usuario con un formulario de confirmación
Route::get('/users/{user}/delete', [UserController::class, 'formDestroy'])->name('users.delete')->middleware('role:admin');

// Ruta para eliminar un seguimiento con un formulario de confirmación
Route::get('/trackings/{tracking}/delete', [TrackingController::class, 'formDestroy'])->name('trackings.delete')->middleware('role:admin');

// Ruta para eliminar un curso con un formulario de confirmación
Route::get('/courses/{course}/delete', [CourseController::class, 'formDestroy'])->name('courses.delete')->middleware('role:admin');

// Route::group([], function () {
//     Route::resources([
//         'students' => StudentController::class,
//         'tutors' => TutorController::class,
//         'companies' => CompanyController::class,
//         'trackings' => TrackingController::class,
//         'users' => UserController::class,
//     ]);




// Ruta para el login admin
// Route::get('/admin/index', [AdminController::class, 'index'])
//     ->name('admin.index')
//     ->middleware('role:admin'); // Asegúrate de que 'auth' es el nombre de tu middleware

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('role:admin');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
