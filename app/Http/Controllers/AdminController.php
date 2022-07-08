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
}
