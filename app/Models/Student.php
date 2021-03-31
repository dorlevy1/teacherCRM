<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Student extends Model
{
    use HasFactory;

        protected $guarded = [];


    public function class(){
        return $this->belongsToMany(Classes::class,'class_student','student_id','clas_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function teacher(){

        return $this->belongsTo(Teacher::class);
    }
}
