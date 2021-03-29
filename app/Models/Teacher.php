<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Teacher extends Model
{
    use HasFactory;

    protected $guarded =[];



    public function own_user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function classes(){

        return $this->belongsToMany(Classes::class,'class_teacher','id','class_id');
    }
}
