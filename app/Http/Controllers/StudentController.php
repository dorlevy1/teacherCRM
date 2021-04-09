<?php

namespace App\Http\Controllers;

use App\Models\Classes;
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
        // Create new User
        $new_user = User::create($request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]));

        // Create new Student
        $student = $new_user->teacher->students->create($request->validate([
            'name' => 'required',
        ]));

        // Attach class to user in class_student table
        Student::find($student->id)->class->attach($request->validate(['class_id' => 'required']));

        // Create new row on user_detail with the details of the current student
        $user_detail = new UserDetail($request->validate([
            'user_id' => $new_user->id,
            'class_id' => 'required',
            'name' => $new_user->name,
            'age' => 'required|numeric',
            'phone' => 'required',
            'city' => 'required',
            'gender' => 'required',
            'private_notes' => '',
        ]));

        // Save new $user_detail
        $user_detail->save();


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
