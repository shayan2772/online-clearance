<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class AccountsController extends Controller
{
    public function getStudentsTable(Type $var = null)
    {
        $students = Department::where('department_name', 'Accounts')->first()->users()->get();
        // dd($students);
        return view('theme.accounts.studentsTable', ['students' => $students]);
    }
}
