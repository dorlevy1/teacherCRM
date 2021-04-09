<?php

namespace App\Http\Controllers;

use App\Models\ClassStudent;
use App\Models\Student;
use App\Models\Teacher;
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

    public function store(Request $request, User $user)
    {


        $new_user = User::create($request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]));

        $user->teacher->students->create($request->validate([
            'name' => 'required',
            'user_id' => $new_user->id,
        ]));

        $class = $new_user->student->class->create($request->validate([
            'class_id' => 'required',
        ]));

        UserDetail::create($request->validate([
            'user_id' => $new_user->id,
            'class_id' => $class->id,
            'name' => $new_user->name,
            'age' => 'required|numeric',
            'phone' => 'required',
            'city' => 'required',
            'gender' => 'required',
            'private_notes' => '',
        ])
        );


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
