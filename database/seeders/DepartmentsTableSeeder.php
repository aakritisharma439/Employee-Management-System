<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
   public function run()
    {
       $departments = [
            ['id' => 1, 'name' => 'Human Resources'],
            ['id' => 2, 'name' => 'BDE'],
            ['id' => 3, 'name' => 'Marketing'],
            ['id' => 4, 'name' => 'Development'],
            ['id' => 5, 'name' => 'Designing'],
        ];
        DB::table('department')->insert($departments);
    }

}
