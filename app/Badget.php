<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Badget extends Model
{
    protected $table = 'badges';
    public $primaryKey = 'id';
    public $incrementing = false;
}
