<?php namespace Tecksky\Affiliate\Model;

use Illuminate\Database\Eloquent\Model;
use Sentinel;

class DataTrafficLogin extends Model {
    
    public $primaryKey = 'id';
    protected $table = 'data_traffic_login';
    public $timestamps = false;

    public static function insert($click){

        $tracking = new DataTrafficLogin();
        $tracking->data_traffic_id = $click;
        $tracking->user_id = Sentinel::getUser()->id;
        $tracking->save();
        return $tracking->id;
    }
    
}