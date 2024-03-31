<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TrackingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Models\Student;

Route::get('/', function () {
    return view('home');
});

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
Route::view('/login', 'login')->name('login');


// Ruta para eliminar un estudiante con un formulario de confirmación
Route::get('/students/{student}/delete', [StudentController::class, 'formDestroy'])->name('students.delete');
// Ruta para eliminar un tutor con un formulario de confirmación
Route::get('/tutors/{tutor}/delete', [TutorController::class, 'formDestroy'])->name('tutors.delete');
// Ruta para eliminar una empresa con un formulario de confirmación
Route::get('/companies/{company}/delete', [CompanyController::class, 'formDestroy'])->name('companies.delete');
