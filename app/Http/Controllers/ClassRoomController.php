<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\UserDetail;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    public function index(Teacher $teacher)
    {

        return view('class_room.index', compact(['students' => $teacher->classes]));
    }

    public function create()
    {

        return view('class_room.create');

    }

    public function store(Request $request)
    {

        auth()->user->teacher->class->create($request->validate([
            'name'=>'required',
        ]));

    }

    public function edit($classes)
    {
        return view('class_room.edit', compact(['classes' => Classes::find($classes)]));

    }

    public function update()
    {
    }

    public function destroy()
    {
    }
}
