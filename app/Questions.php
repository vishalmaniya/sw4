<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $table = 'questions';
    public $primaryKey = 'id';
    public $incrementing = false;
    
    public function lession(){
        return $this->hasOne('App\Lession','id','lession_id');
    }
    public function question_join(){
        return $this->hasOne('App\QuestionAnswer','questions_id','id')->with('option');
    }
    
    public function viewed_question(){
        return $this->hasOne('App\Exam','question_id','id');
    }
}
