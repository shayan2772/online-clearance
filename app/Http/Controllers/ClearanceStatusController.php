<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ClearanceStatusController extends Controller
{
    public function index()
    {
        $departments = auth()->user()->departments()->get();
        return view('theme.student.clearanceStatus', ['departments' => $departments]);
    }
}
