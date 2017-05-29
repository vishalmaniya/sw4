<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoursesToTeacher extends Model
{
    protected $table = 'teacher_score';
    public $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;
    
    public function courses(){
        return $this->hasOne('App\Courses','id','courses_id')->with('category','chapter');
    }
    
    public function teacher(){
        return $this->hasOne('App\User','id','users_id');
    }
}
