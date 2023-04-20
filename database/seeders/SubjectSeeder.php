<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('subject')->insert([
            ['subject_name'=>'English'],['subject_name'=>'Tamil'],['subject_name'=>'Maths'],['subject_name'=>'Science'],['subject_name'=>'Social Science']
        ]);
        
    }
}
