<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Teacher $teacher){

        return view('student.index',compact($teacher->students));
    }

    public function create(){}

    public function edit(){}

    public function update(){}

    public function destroy(){}
}
