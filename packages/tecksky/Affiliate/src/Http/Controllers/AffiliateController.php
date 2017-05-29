<?php
/**
 * Created by PhpStorm.
 * User: evgeniy
 * Date: 28.04.16
 * Time: 17:41
 */

namespace Tecksky\Affiliate\Http\Controllers;

use App\Http\Controllers\Controller;
use Tecksky\Affiliate\Model\DataTraffic;
use Tecksky\Affiliate\Model\DataTrafficLogin;


class AffiliateController extends Controller
{

    public static function save_data_traffic($link){
        $data1 = array(
            "link_id"=>$link,
            "user_agent"=>$_SERVER['HTTP_USER_AGENT'],
            "ip"=>$_SERVER['REMOTE_ADDR']
        );
        $data = DataTraffic::insert($data1);
        return $data;
    }
    
    public function getAll(){
        $data = DataTraffic::getAll();
        return $data;
    }
    
    public function getUserTraffic(){
        $data = DataTraffic::getUser();
        return $data;
    }
    
    
}