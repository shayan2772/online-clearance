<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\User;

class ResearchCellController extends Controller
{
    public function getStudentsTable()
    {
        $students = Department::where('department_name', 'Research Cell')->first()->users()->where('cnic', '!=', null)->get();

        return view('theme.research_cell.studentsTable', ['students' => $students]);
    }

    public function unclearStudentStatus($id)
    {
        User::find($id)->departments()->sync([3 => [ 'department_clearance_status' => 0] ], false);

        $user = User::find($id);

        $user->clearance_status = 0;

        $user->save();

        return redirect()->route('researchCellStudentsTable');
    }

    public function clearStudentStatus($id)
    {
        User::find($id)->departments()->sync([3 => [ 'department_clearance_status' => 1] ], false);

        $statuses = User::find($id)->departments()->get();

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

        User::find($id)->departments()->sync([2 => [ 'department_clearance_status' => $checkStatus] ], false);

        $user = User::find($id);

        $user->clearance_status = $checkStatus;

        $user->save();

        return redirect()->route('researchCellStudentsTable');
    }

    public function submitRemarks(Request $request)
    {
        User::find($request->id)->departments()->sync([3 => [ 'remarks' => $request->remarks] ], false);
        return true;
    }
}
