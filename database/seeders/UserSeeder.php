<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'=>'Admin',
                'email'=>'admin@admin.com',
                'role'=>'Admin',
                'password'=> bcrypt('12345678'),
            ],
            [
                'name'=>'I/C Library',
                'email'=>'icLibrary@icLibrary.com',
                'role'=>'I/C Library',
                'password'=> bcrypt('12345678'),
            ],
            [
                'name'=>'HOD',
                'email'=>'hod@hod.com',
                'role'=>'HOD',
                'password'=> bcrypt('12345678'),
            ],
            [
                'name'=>'Research Cell',
                'email'=>'researchcell@researchcell.com',
                'role'=>'Research Cell',
                'password'=> bcrypt('12345678'),
            ],
            [
                'name'=>'I/C Progress',
                'email'=>'icprogress@icprogress.com',
                'role'=>'I/C Progress',
                'password'=> bcrypt('12345678'),
            ],
            [
                'name'=>'Accounts',
                'email'=>'accounts@accounts.com',
                'role'=>'Accounts',
                'password'=> bcrypt('12345678'),
            ],
            [
                'name'=>'Student1',
                'email'=>'student1@student.com',
                'roll_no'=>'01-134142-01',
                'password'=> bcrypt('12345678'),
                'role'=>'Student',
            ],
            [
                'name'=>'Student2',
                'email'=>'student2@student.com',
                'roll_no'=>'01-134142-02',
                'password'=> bcrypt('12345678'),
                'role'=>'Student',
            ],
            [
                'name'=>'Student3',
                'email'=>'student3@student.com',
                'roll_no'=>'01-134142-03',
                'password'=> bcrypt('12345678'),
                'role'=>'Student',
            ],
            [
                'name'=>'Student4',
                'email'=>'student4@student.com',
                'roll_no'=>'01-134142-04',
                'password'=> bcrypt('12345678'),
                'role'=>'Student',
            ],
            [
                'name'=>'Student5',
                'email'=>'student5@student.com',
                'roll_no'=>'01-134142-05',
                'password'=> bcrypt('12345678'),
                'role'=>'Student',
            ],
            [
                'name'=>'Student6',
                'email'=>'student6@student.com',
                'roll_no'=>'01-134142-06',
                'password'=> bcrypt('12345678'),
                'role'=>'Student',
            ],
            [
                'name'=>'Student7',
                'email'=>'student7@student.com',
                'roll_no'=>'01-134142-07',
                'password'=> bcrypt('12345678'),
                'role'=>'Student',
            ],
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
