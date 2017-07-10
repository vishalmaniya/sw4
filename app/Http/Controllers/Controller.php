<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Sentinel;
use DB;
use App\Exam;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function __construct() {
        $user = Sentinel::check();
        $score_count = Exam::where('user_id',$user->id)->selectRaw('SUM(score)')->get();
        View::share('user', $user);
        View::share('score_count', $score_count);
    }


    public function get_primary_key($table){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 6; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $time = time();
        $split = str_split($randomString,3);
        
        $sring = $split[0].$time.$split[1];
        
        $old_id = DB::table($table)->where('id',$sring)->select('id')->first();
        if(!empty($old_id)){
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 6; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            $time = time();
            $split = str_split($randomString,3);
            $sring1 = $split[0].$time.$split[1];
            if($sring == $sring1){
               $sring = $this->get_primary_key($table);
            }
        }
        return $sring;
    }
}
