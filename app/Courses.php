<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table = 'courses';
    public $primaryKey = 'id';
    public $incrementing = false;
    
    public function category(){
        return $this->hasOne('App\Category','id','category_id');
    }
    
    public function chapter(){
        return $this->hasMany('App\Chapters','courses_id','id')->orderBy('position')->with('lessons');
    }
    
}
