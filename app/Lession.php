<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lession extends Model
{
    protected $table = 'lession';
    public $primaryKey = 'id';
    public $incrementing = false;
    
    public function chapter(){
        return $this->hasOne('App\Chapters','id','chapter_id')->with('course');
    }
    
    public function questions(){
        return $this->hasMany('App\Questions','lession_id','id')->with('viewed_question')->orderBy('position');
    }
}
