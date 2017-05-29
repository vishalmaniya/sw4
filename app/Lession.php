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
}
