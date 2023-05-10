<?php

namespace Centrust\CloudflareAnalytics;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class CloudflareAnalytics
{


    public function __construct()
    {
        //
    }
    public static function LogPage(string $page)
    {
        $Request =$_REQUEST;

        $Server =$_SERVER;

        Log::info('message', ['Request' => $Request, 'Server' => $Server]);


    }
    public  function LogModel(Model $Model)
    {


    }
//
//        if (isset($_SERVER['HTTP_CLIENT_IP']))
//            $ip = $_SERVER['HTTP_CLIENT_IP'];
//        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
//            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
//        else if (isset($_SERVER['HTTP_X_FORWARDED']))
//            $ip = $_SERVER['HTTP_X_FORWARDED'];
//        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
//            $ip = $_SERVER['HTTP_FORWARDED_FOR'];
//        else if (isset($_SERVER['HTTP_FORWARDED']))
//            $ip = $_SERVER['HTTP_FORWARDED'];
//        else if (isset($_SERVER['REMOTE_ADDR']))
//            $ip = $_SERVER['REMOTE_ADDR'];
//        else
//            $ip = null;
//        $Name = $Model->getTable() . '_' . $Model->id . '_' . $ip;
////        if (auth()->check()) {
////            $Name = $Model->getTable() . '_' . $Model->id . '_User:' . auth()->user()->id;
////        }
//
//        //   Log::info('CacheKey 1' , ['key'=>$Name, 'Ip'=>$ip  ]);
//        if (!Cache::has($Name)) {
//
//            Cache::put($Name, '1', Carbon::now()->addMinutes(60)); // cache the hit for 60 seconds
////            Log::info('PageViewCounter Tender Hits: 34', ['key' => $Name]);
//            $Model->increment('hits');
//
//        }
//
//        return $Model->hits;
//    }

    public static function Externalincrement($Model)
    {

        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ip = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ip = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ip = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ip = $_SERVER['REMOTE_ADDR'];
        else
            $ip = null;

        $Name = $Model->getTable() . '_' . $Model->id . '_' . $ip;


        //   Log::info('CacheKey 1' , ['key'=>$Name, 'Ip'=>$ip  ]);
        if (!Cache::has($Name)) {
            Cache::put($Name, '1', Carbon::now()->addMinutes(60)); // cache the hit for 60 seconds
            //  Log::info('CacheKey 2' , ['key'=>$Name, 'Ip'=>$ip , 'Cache'=>Cache::get($Name), 'cached'=>'true' ]);
            $Model->increment('hits');

        }

        return $Model->hits;
    }

    private function getIp()
    {

        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ip = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ip = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ip = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ip = $_SERVER['REMOTE_ADDR'];
        else
            $ip = null;

        return $ip;
    }


}
