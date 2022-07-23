<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Department;
use Illuminate\Database\Seeder;

class RemarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=7; $i <= 25; $i++) {
            $departments = User::find($i)->departments()->get();
//            dd($departments);
            foreach ($departments as $department){

//            for ($j=1; $j <= 5; $j++) {
                if (!$department->pivot->department_clearance_status) {
                    if($department->id == 1) {
                        User::find($i)->departments()->sync([$department->id => [ 'remarks' => "You haven't returned you Library card or Book to the Library Dpt." ] ], false);
                    }
                    elseif($department->id == 2) {
                        User::find($i)->departments()->sync([$department->id => [ 'remarks' => 'If you are cleared from all other departments then HOD will be auto cleared.'] ], false);
                    }
                    elseif($department->id == 3) {
                        User::find($i)->departments()->sync([$department->id => [ 'remarks' => "You haven't submitted your Thesis yet."] ], false);
                    }
                    elseif($department->id == 4) {
                        User::find($i)->departments()->sync([$department->id => [ 'remarks' => 'You semester subject not cleared.'] ], false);
                    }
                    elseif($department->id == 5) {
                        User::find($i)->departments()->sync([$department->id => [ 'remarks' => 'Some of you dues are pending in Accounts department.'] ], false);
                    }
                }
            }
        }
    }
}
