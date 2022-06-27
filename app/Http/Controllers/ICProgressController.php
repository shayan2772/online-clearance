<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\User;

class ICProgressController extends Controller
{
    public function getStudentsTable()
    {
        $students = Department::where('department_name', 'I/C Progress')->first()->users()->get();
        return view('theme.ic_progress.studentsTable', ['students' => $students]);
    }

    public function unclearStudentStatus($id)
    {
        User::find($id)->departments()->sync([4 => [ 'department_clearance_status' => 0] ], false);

        return $this->getStudentsTable();
    }

    public function clearStudentStatus($id)
    {
        User::find($id)->departments()->sync([4 => [ 'department_clearance_status' => 1] ], false);

        return $this->getStudentsTable();
    }
}
