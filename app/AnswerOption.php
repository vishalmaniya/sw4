<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerOption extends Model
{
    protected $table = 'answer_option';
    public $primaryKey = 'id';
    public $incrementing = false;
}
