<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\User;

class HODController extends Controller
{
    public function getStudentsTable()
    {
        $students = Department::where('department_name', 'HOD')->first()->users()->get();
        return view('theme.hod.studentsTable', ['students' => $students]);
    }

    public function unclearStudentStatus($id)
    {
        User::find($id)->departments()->sync([2 => [ 'department_clearance_status' => 0] ], false);

        return $this->getStudentsTable();
    }

    public function clearStudentStatus($id)
    {
        User::find($id)->departments()->sync([2 => [ 'department_clearance_status' => 1] ], false);

        return $this->getStudentsTable();
    }
}
