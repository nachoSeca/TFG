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
}
