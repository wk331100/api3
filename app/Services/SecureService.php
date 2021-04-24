<?php
namespace App\Services;

use App\Libs\MessageCode;
use App\Libs\RedisKey;
use System\Redis;
use System\Response;

class SecureService {

    /**
     * 检查暴力注入
     */
    public static function CheckViolenceInjection($ip, $frequency = 10){
        $time = date("YmdHi");
        $clientKey = RedisKey::getClientKey($ip, $time);
        $redis = new Redis();
        $num = $redis->incr($clientKey);
        $redis->expire($clientKey, 60);
        if ($num > $frequency){
            return false;
        }
        return true;
    }


    /**
     * 检查暴力请求
     * @param $ip
     * @param int $frequency
     * @return bool
     */
    public static function CheckViolenceRequest($ip, $frequency = 60){
        $time = date("YmdHi");
        $clientKey = RedisKey::getClientKey($ip, $time);
        $redis = new Redis();
        $num = $redis->incr($clientKey);
        $redis->expire($clientKey, 60);
        if ($num > $frequency){
            return false;
        }
        return true;
    }



}