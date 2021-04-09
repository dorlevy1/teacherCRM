<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\ClassStudent;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\UserDetail;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Teacher $teacher)
    {

        return view('student.index', compact(['students' => $teacher->students]));
    }

    public function create()
    {

        return view('student.create');

    }

    public function store(Request $request)
    {

        $new_user = User::create($request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]));

       $student = $new_user->teacher->students->create($request->validate([
            'name' => 'required',
        ]));

       $class = $new_user->teacher->class->create($request->validate([
            'name'=>'required',
        ]));

       Classes::find($class->id)->students->attach($student->id);

        Student::find($student->id)->class->attach($class->id);

        $user_details = new UserDetail($request->validate([
            'user_id' => $new_user->id,
            'class_id' => $class->id,
            'name' => $new_user->name,
            'age' => 'required|numeric',
            'phone' => 'required',
            'city' => 'required',
            'gender' => 'required',
            'private_notes' => '',
        ]));

        $user_details->save();



    }

    public function edit(Student $student)
    {
        return view('student.edit', compact(['student' => $student]));

    }

    public function update()
    {
    }

    public function destroy()
    {
    }
}
