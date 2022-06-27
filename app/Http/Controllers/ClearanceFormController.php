<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClearanceFormController extends Controller
{
    public function index()
    {
        return view('theme.student.clearanceForm');
    }

    public function storeClearanceForm(Request $request)
    {
        $request->validate([
            'studentName' => ['required', 'string', 'max:255'],
            'fatherName' => ['required', 'string', 'max:255'],
            'studentCNIC' => ['required', 'string', 'min:13', 'max:13'],
            'contactNumber' => ['required', 'string', 'min:11', 'max:11'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        $user = auth()->user()->update([
            'father_name' => $request->fatherName,
            'contact_no' => $request->contactNumber,
            'address' => $request->address,
        ]);
    }
}
