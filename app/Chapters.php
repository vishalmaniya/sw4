<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapters extends Model
{
    protected $table = 'chapter';
    public $primaryKey = 'id';
    public $incrementing = false;
    
    public function course(){
        return $this->hasOne('App\Courses','id','courses_id');
    }
    
    public function lessons(){
        return $this->hasMany('App\Lession','chapter_id','id')->orderBy('position')->with('questions');
    }
}
