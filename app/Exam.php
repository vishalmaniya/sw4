<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table = 'exam';
    public $primaryKey = 'id';
    public $incrementing = false;
}
