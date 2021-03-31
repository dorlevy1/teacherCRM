<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $guarded =[];



    public function teachers(){

        return $this->belongsToMany(Teacher::class,'class_teacher','class_id','teacher_id');
    }


    public function students(){
        return $this->belongsToMany(Student::class,'class_student','class_id','student_id');
    }
}
