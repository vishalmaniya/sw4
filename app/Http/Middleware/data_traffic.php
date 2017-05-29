<?php

namespace App\Http\Middleware;

use Closure;
use Tecksky\Affiliate\Http\Controllers\AffiliateController;
use App\TrafficLink;

class data_traffic
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $request_url = $request->fullUrl();
        $link = TrafficLink::where('link',$request_url)->first();
        if(empty($link)){
            $link = new TrafficLink();
            $link->link = $request_url;
            $link->save();
        }
        
        $data = AffiliateController::save_data_traffic($link->id);
        return $next($request);
    }
}
