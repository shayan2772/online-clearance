<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            [
                'department_code'=>'L-001',
                'department_name'=>'I/C Library',
                'clearance_status'=>0,
            ],
            [
                'department_code'=>'H-002',
                'department_name'=>'HOD',
                'clearance_status'=>0,
            ],
            [
                'department_code'=>'R-003',
                'department_name'=>'Research Cell',
                'clearance_status'=>0,
            ],
            [
                'department_code'=>'P-004',
                'department_name'=>'I/C Progress',
                'clearance_status'=>0,
            ],
            [
                'department_code'=>'A-005',
                'department_name'=>'Accounts',
                'clearance_status'=>0,
            ],
        ];

        foreach ($departments as $key => $value) {
            Department::create($value);
        }
    }
}
