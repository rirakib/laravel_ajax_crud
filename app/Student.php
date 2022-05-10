<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = ['name','father_name','mobile_number','email','sign_image','student_image'];

}
