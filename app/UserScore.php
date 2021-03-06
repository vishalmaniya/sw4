<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserScore extends Model
{
    protected $table = 'user_score';
    public $primaryKey = 'id';
    public $incrementing = false;
    
    public function course(){
        return $this->hasOne('App\Courses','id','course_id')->orderBy('position','ASC')->with('category','chapter');
    }
    
    public function user(){
    	return $this->hasOne('App\User','id','user_id');
    }
}
