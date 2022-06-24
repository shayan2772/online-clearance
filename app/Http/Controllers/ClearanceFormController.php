<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClearanceFormController extends Controller
{
    public function index()
    {
        return view('theme.student.clearanceForm');
    }
}
