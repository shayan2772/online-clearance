<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class ICProgressController extends Controller
{
    public function getStudentsTable(Type $var = null)
    {
        $students = Department::where('department_name', 'I/C Progress')->first()->users()->get();
        return view('theme.ic_progress.studentsTable', ['students' => $students]);
    }
}
