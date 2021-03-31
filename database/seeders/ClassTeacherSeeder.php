<?php

namespace Database\Seeders;

use App\Models\Classes;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacher=Teacher::factory()->create()->id;

        for ($i = 0; $i < 3; $i++) {

            DB::table('class_teacher')->insert([
                'teacher_id' => $teacher,
                'class_id' => Classes::factory()->create()->id
            ]);
        }
        for ($i = 0; $i < 5; $i++) {

            DB::table('class_teacher')->insert([
                'teacher_id' => Teacher::factory()->create()->id,
                'class_id' => Classes::factory()->create()->id
            ]);
        }
    }
}
