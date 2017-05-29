<?php namespace Tecksky\Affiliate\Model;

use Illuminate\Database\Eloquent\Model;
use Tecksky\Affiliate\Model\DataTrafficLogin;
use Sentinel;

class DataTraffic extends Model {

    public $primaryKey = 'id';
    protected $table = 'data_traffic';


    public static function insert($link){

        $links = new DataTraffic();
        $links->traffic_link_id = $link['link_id'];
        $links->user_agent = $link['user_agent'];
        $links->ip = $link['ip'];
        $links->save();
        if(Sentinel::check()){
            $user_save = DataTrafficLogin::insert($links->id);
        }
        else{
            $user_save = $links->id;
        }
        return $user_save;
    }
    
    public static function getAll(){
        $links = DataTraffic::join('data_traffic_login')
                ->get();
        return $links;
    }
    
    public static function getUser(){
        $links = DataTraffic::join(['data_traffic_login'=>function($q){
            return $q->where('user_id',Sentinel::getUser()->id)->get();
        }])->get();
        return $links;
    }
    
    public function data_traffic_login(){
        return $this->hasOne('Tecksky\Affiliate\Model\DataTrafficLogin','data_traffic_id','user_id');
    }
    
}