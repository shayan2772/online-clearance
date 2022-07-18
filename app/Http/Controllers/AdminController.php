<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
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
        $departments = Department::with('users')->get();
//        dd($departments[0]->users[0]->pivot);
        return view('theme.admin.clearedStudentsTable', ['departments' => $departments]);
    }
}
