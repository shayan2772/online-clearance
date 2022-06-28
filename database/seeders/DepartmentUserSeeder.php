<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Department;

class DepartmentUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=6; $i <= 12; $i++) {
            User::find($i)->departments()->attach([1,2,3,4,5]);
            for ($j=1; $j <= 5; $j++) {
                User::find($i)->departments()->sync([$j => [ 'department_clearance_status' => rand(0,1)] ], false);
            }
        }

    }
}
