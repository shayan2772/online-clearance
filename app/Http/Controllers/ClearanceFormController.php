<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClearanceFormController extends Controller
{
    public function index()
    {
        if(empty(auth()->user()->cnic)) {
            return view('theme.student.clearanceForm');
        }
        else {
            return redirect()->route('clearanceStatus');
        }
    }

    public function storeClearanceForm(Request $request)
    {
        $request->validate([
            'studentName' => ['required', 'string', 'max:255'],
            'fatherName' => ['required', 'string', 'max:255',],
            'cnic' => ['required', 'digits:13', 'unique:users'],
            'contact_no' => ['required', 'digits:11', 'unique:users'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        $user = auth()->user()->update([
            'father_name' => $request->fatherName,
            'cnic' => $request->studentCNIC,
            'contact_no' => $request->contactNumber,
            'address' => $request->address,
        ]);

        return redirect()->route('clearanceStatus');
    }
}
