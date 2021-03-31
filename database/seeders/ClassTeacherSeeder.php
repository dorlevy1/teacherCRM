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

        $teacher = Teacher::factory()->create();
        $user2 = User::factory()->create();
        $class = Classes::factory()->create()->id;
//        for ($i = 1; $i < 3; $i++) {

            DB::table('class_teacher')->insert([
                'teacher_id' => $teacher->own_user->id,
                'class_id' => $class,
            ]);

            DB::table('students')->insert([
                'user_id' =>  $user2->id,
                'teacher_id' => $teacher->own_user->id,
                'name'=> $faker->name
            ]);

            DB::table('class_student')->insert([
                'class_id' => $class,
                'student_id' => $user2->id,
            ]);

//        }

    }
}
