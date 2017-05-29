<?php
/**
 * Created by PhpStorm.
 * User: evgeniy
 * Date: 24.04.16
 * Time: 14:44
 */
namespace Tecksky\Affiliate\Lib;

use Tecksky\Affiliate\Model\AffiliateLink;
use Tecksky\Affiliate\Model\AffiliateLinkTracker;

use App\User;
use App\AffiliateBanner;

use Exception;
use Carbon\Carbon;

class Affiliate {

    
    public function __construct()
    {
        
    }
    
    public function getHistory(){
        $link =  new AffiliateLink;
        $links = $link->getAll();
        $responce = array();
        $c=0;
        foreach ($links as $history) {
            $responce[$c] = $history;
            $responce[$c]['click'] = $link->number_click($history->id);
            $c++;
        }
        return $responce;
    }
    
    public function getHistoryCurrent($user_id){
        $link =  new AffiliateLink;
        $history = $link->getCurrent($user_id);
        $responce = array();
        $c=0;
        $id = 0;
        foreach ($history as $v) {
            if($id != $v->affiliate_link_id){
                $responce[$c] = $v;
                $responce[$c]['click'] = $link->number_click($v->id);
                $responce[$c]['money'] = $link->money_count($v->affiliate_link_id);
                $id = $v->affiliate_link_id;
                $c++;
            }
        }
        return $responce;
    }


    public function createLink($link){
        
        $links = new AffiliateLink;
        $links->insert($link);
        return true;
    }
    
    public function getLastId(){
        $links = new AffiliateLink;
        $last_id = $links->lastId();

        return $last_id[0]->id;
    }
    
    public function click($click){
        $new_click = new AffiliateLinkTracker;
        $id = new AffiliateLink;
        $click['affiliate_link_id'] = $id->getId($click['link']);
        if(!empty($click['affiliate_link_id'])){
            $is_click = $new_click->check_is_payable($click);
        }else{
            $is_click = 0;
        }
        return $is_click;
    }

}