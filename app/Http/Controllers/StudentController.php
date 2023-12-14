<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentProfile;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index () {
        // $single = Student::with('profile')->find(1);
        // dd($single->name, $single->email, $single->profile->country);
        $single = StudentProfile::with('student')->find(1);
        dd($single->student->name, $single->student->email, $single->country);
    }
}
