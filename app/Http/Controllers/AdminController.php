<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getStudentsTable()
    {
        $departments = Department::with('users')->get();
        return view('theme.admin.studentsTable', ['departments' => $departments]);
    }

    public function getClearedStudentsTable()
    {
        $students = User::where('role', 'Student')->where('clearance_status', 1)->get();
//        dd($departments[0]->users[0]->pivot);
        return view('theme.admin.clearedStudentsTable', ['students' => $students]);
    }
}
