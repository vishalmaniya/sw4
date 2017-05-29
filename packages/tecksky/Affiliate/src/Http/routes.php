<?php
/**
 * Created by PhpStorm.
 * User: evgeniy
 * Date: 28.04.16
 * Time: 17:40
 */


//for get traffic
Route::get('/data_traffic/store/{link}', 'Tecksky\\Affiliate\\Http\\Controllers\\AffiliateController@save_data_traffic');
Route::get('/data_traffic/all','Tecksky\\Affiliate\\Http\\Controllers\\AffiliateController@getAll');
Route::get('/data_traffic/user','Tecksky\\Affiliate\\Http\\Controllers\\AffiliateController@getUserTraffic');
//for get traffic
