<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\User;

class AccountsController extends Controller
{
    public function getStudentsTable()
    {
        $students = Department::where('department_name', 'Accounts')->first()->users()->get();
        return view('theme.accounts.studentsTable', ['students' => $students]);
    }

    public function unclearStudentStatus($id)
    {
        User::find($id)->departments()->sync([5 => [ 'department_clearance_status' => 0] ], false);

        return $this->getStudentsTable();
    }

    public function clearStudentStatus($id)
    {
        User::find($id)->departments()->sync([5 => [ 'department_clearance_status' => 1] ], false);

        return $this->getStudentsTable();
    }
}
