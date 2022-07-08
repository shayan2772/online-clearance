<?php

namespace App\Http\Controllers;

use App\Mail\FormSubmitted;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        auth()->user()->update([
            'father_name' => $request->fatherName,
            'cnic' => $request->cnic,
            'contact_no' => $request->contact_no,
            'address' => $request->address,
        ]);

        $statuses = auth()->user()->departments()->get();

        $checkStatus = 1;

        foreach ($statuses as $status) {
            if ($status->id !== 2) {
                if($status->pivot->department_clearance_status) {
                    continue;
                }
                else {
                    $checkStatus = 0;
                    break;
                }
            }
        }

        auth()->user()->departments()->sync([2 => [ 'department_clearance_status' => $checkStatus] ], false);

        $user = auth()->user();

        $user->clearance_status = $checkStatus;

        $user->save();

        foreach ($statuses as $status) {
            if(!$status->pivot->department_clearance_status) {

                $admin = User::find($status->pivot->department_id);

                Mail::to($admin->email)->send(new FormSubmitted($admin->name));
            }
        }

        return redirect()->route('clearanceStatus');
    }
}
