<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table = 'classroom';
    public $primaryKey = 'id';
    public $incrementing = false;
    
    public function user(){
        return $this->hasMany('App\UserScore','classroom_id','id');
    }
    
    public function teacher(){
        return $this->hasOne('App\UserScore','user_id','teacher_id');
    }
}
