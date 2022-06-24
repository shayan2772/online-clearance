<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class ResearchCellController extends Controller
{
    public function getStudentsTable(Type $var = null)
    {
        $students = Department::where('department_name', 'Research Cell')->first()->users()->get();
        return view('theme.research_cell.studentsTable', ['students' => $students]);
    }
}
