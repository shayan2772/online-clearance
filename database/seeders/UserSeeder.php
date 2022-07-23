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
        $departments = [];
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
                'name'=>'Kashaf Ishaque',
                'email'=>'kashafishaque1@gmail.com',
                'roll_no'=>'AU_02_05_09420',
                'password'=> bcrypt('12345678'),
                'role'=>'Student',
                'enrollement'=>'281',
                'department'=>'Computer Science',
            ],
            [
                'name'=>'Tahreem Ikram',
                'email'=>'tahreemikram34@gmail.com',
                'roll_no'=>'AU_02_05_09421',
                'password'=> bcrypt('12345678'),
                'role'=>'Student',
                'enrollement'=>'282',
                'department'=>'Computer Science',
            ],
            [
                'name'=>'Safa Yousaf',
                'email'=>'safayousaf78@gmail.com',
                'roll_no'=>'AU_02_05_09422',
                'password'=> bcrypt('12345678'),
                'role'=>'Student',
                'enrollement'=>'283',
                'department'=>'Computer Science',
            ],
            [
                'name'=>'Ayesha Kanwal',
                'email'=>'ayeshakanwal145@gmail.com',
                'roll_no'=>'AU_02_05_09423',
                'password'=> bcrypt('12345678'),
                'role'=>'Student',
                'enrollement'=>'284',
                'department'=>'Computer Science',
            ],
            [
                'name'=>'Nimra Khausar',
                'email'=>'nimrakhausar5@gmail.com',
                'roll_no'=>'AU_02_05_09424',
                'password'=> bcrypt('12345678'),
                'role'=>'Student',
                'enrollement'=>'285',
                'department'=>'Computer Science',
            ],
            [
                'name'=>'Khizra Fatima',
                'email'=>'khizrafatima12@gmail.com',
                'roll_no'=>'AU_02_05_09425',
                'password'=> bcrypt('12345678'),
                'role'=>'Student',
                'enrollement'=>'286',
                'department'=>'Computer Science',
            ],
            [
                'name'=>'Sana Amjad',
                'email'=>'sanaamjad43@gmail.com',
                'roll_no'=>'AU_02_05_09426',
                'password'=> bcrypt('12345678'),
                'role'=>'Student',
                'enrollement'=>'287',
                'department'=>'Computer Science',
            ],
            [
                'name'=>'Anum Aftab',
                'email'=>'anumaftab213@gmail.com',
                'roll_no'=>'AU_03_06_09310',
                'password'=> bcrypt('12345678'),
                'role'=>'Student',
                'enrollement'=>'620',
                'department'=>'English',
            ],
            [
                'name'=>'Aqsa Hassan',
                'email'=>'aqsahassan433@gmail.com',
                'roll_no'=>'AU_03_06_09311',
                'password'=> bcrypt('12345678'),
                'role'=>'Student',
                'enrollement'=>'621',
                'department'=>'English',
            ],
            [
                'name'=>'Eisha Chaudhry',
                'email'=>'eishachaudhry171@gmail.com',
                'roll_no'=>'AU_03_06_09312',
                'password'=> bcrypt('12345678'),
                'role'=>'Student',
                'enrollement'=>'622',
                'department'=>'English',
            ],
            [
                'name'=>'Falak Bibi',
                'email'=>'falakbibi187@gmail.com',
                'roll_no'=>'AU_03_06_09313',
                'password'=> bcrypt('12345678'),
                'role'=>'Student',
                'enrollement'=>'623',
                'department'=>'English',
            ],
            [
                'name'=>'Fariha Naz',
                'email'=>'farihanaz567@gmail.com',
                'roll_no'=>'AU_03_06_09314',
                'password'=> bcrypt('12345678'),
                'role'=>'Student',
                'enrollement'=>'624',
                'department'=>'English',
            ],
            [
                'name'=>'Iqra Shakeel',
                'email'=>'iqrashakeel1211@gmail.com',
                'roll_no'=>'AU_03_06_09315',
                'password'=> bcrypt('12345678'),
                'role'=>'Student',
                'enrollement'=>'625',
                'department'=>'English',
            ],
            [
                'name'=>'Tayyaba Shafiq',
                'email'=>'tayyabashafiq15@gmail.com',
                'roll_no'=>'AU_04_08_09571',
                'password'=> bcrypt('12345678'),
                'role'=>'Student',
                'enrollement'=>'101',
                'department'=>'Mathematics',
            ],
            [
                'name'=>'Amna Ijaz',
                'email'=>'amnaijaz519@gmail.com',
                'roll_no'=>'AU_04_08_09572',
                'password'=> bcrypt('12345678'),
                'role'=>'Student',
                'enrollement'=>'102',
                'department'=>'Mathematics',
            ],
            [
                'name'=>'Warda Anfal',
                'email'=>'wardaanfal1123@gmail.com',
                'roll_no'=>'AU_04_08_09573',
                'password'=> bcrypt('12345678'),
                'role'=>'Student',
                'enrollement'=>'103',
                'department'=>'Mathematics',
            ],
            [
                'name'=>'Hamna Waheed',
                'email'=>'hamnawaheed955@gmail.com',
                'roll_no'=>'AU_04_08_09574',
                'password'=> bcrypt('12345678'),
                'role'=>'Student',
                'enrollement'=>'104',
                'department'=>'Mathematics',
            ],
            [
                'name'=>'Saba Yousaf',
                'email'=>'sabayousaf357@gmail.com',
                'roll_no'=>'AU_04_08_09575',
                'password'=> bcrypt('12345678'),
                'role'=>'Student',
                'enrollement'=>'105',
                'department'=>'Mathematics',
            ],
            [
                'name'=>'Aqsa Isahque',
                'email'=>'aqsaisahque313@gmail.com',
                'roll_no'=>'AU_04_08_09576',
                'password'=> bcrypt('12345678'),
                'role'=>'Student',
                'enrollement'=>'106',
                'department'=>'Mathematics',
            ],

        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
