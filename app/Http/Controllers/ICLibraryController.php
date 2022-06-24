<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class ICLibraryController extends Controller
{
    public function getStudentsTable(Type $var = null)
    {
        $students = Department::where('department_name', 'I/C Library')->first()->users()->get();
        return view('theme.ic_library.studentsTable', ['students' => $students]);
    }
}
