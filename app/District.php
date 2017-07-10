<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'district';
    public $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;
}
