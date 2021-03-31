<?php

namespace Database\Seeders;

use App\Models\Classes;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Faker\Factory as Faker;
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
        $faker = Faker::create();

        $teacher=Teacher::factory()->create()->id;
        $userTeacher= Teacher::factory()->create();

        $student= Student::factory()->create();
        for ($i = 1; $i < 3; $i++) {

            DB::table('class_teacher')->insert([
                'teacher_id' => $teacher,
                'class_id' => Classes::factory()->create()->id
            ]);

            DB::table('students')->insert([
                'teacher_id' => $student->teacher->id,
                'name'=> $faker->name
            ]);

            DB::table('class_student')->insert([
                'class_id' => Classes::factory()->create()->id,
                'student_id' => $student->id,
            ]);
        }
//        for ($i = 0; $i < 5; $i++) {
//
//
//            DB::table('class_teacher')->insert([
//                'teacher_id' => Teacher::factory()->create()->id,
//                'class_id' => Classes::factory()->create()->id
//            ]);
//        }
    }
}
