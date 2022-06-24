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
        User::find(6)->departments()->attach([1,2,3,4,5]);
        User::find(7)->departments()->attach([1,2,3,4,5]);
    }
}
