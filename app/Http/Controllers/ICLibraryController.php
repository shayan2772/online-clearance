<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\User;

class ICLibraryController extends Controller
{
    public function getStudentsTable()
    {
        $students = Department::where('department_name', 'I/C Library')->first()->users()->get();

        return view('theme.ic_library.studentsTable', ['students' => $students]);
    }

    public function unclearStudentStatus($id)
    {
        User::find($id)->departments()->sync([1 => [ 'department_clearance_status' => 0] ], false);

        $user = User::find($id);

        $user->clearance_status = 0;

        $user->save();

        return redirect()->route('icLibraryStudentsTable');
    }

    public function clearStudentStatus($id)
    {
        User::find($id)->departments()->sync([1 => [ 'department_clearance_status' => 1] ], false);

        $statuses = User::find($id)->departments()->get();

        $checkStatus = 1;

        foreach ($statuses as $status) {
            if($status->pivot->department_clearance_status) {
                continue;
            }
            else {
                $checkStatus = 0;
                break;
            }
        }

        $user = User::find($id);

        $user->clearance_status = $checkStatus;

        $user->save();

        return redirect()->route('icLibraryStudentsTable');
    }
}
