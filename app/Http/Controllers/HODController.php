<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class HODController extends Controller
{
    public function getStudentsTable(Type $var = null)
    {
        $students = Department::where('department_name', 'HOD')->first()->users()->get();
        return view('theme.hod.studentsTable', ['students' => $students]);
    }
}
