<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    protected $table = 'question_answer';
    public $primaryKey = 'id';
    public $incrementing = false;
    
    public function option(){
        return $this->hasOne('App\AnswerOption','question_answer_id','id');
    }
    
}
