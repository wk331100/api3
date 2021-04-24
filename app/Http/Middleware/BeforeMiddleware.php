<?php

namespace App\Http\Middleware;

use App\Libs\MessageCode;
use App\Libs\RedisKey;
use App\Libs\Util;
use App\Services\SecureService;
use System\Redirect;
use System\Redis;
use System\Request;
use System\Response;

class BeforeMiddleware{

    public function handle(Request $request){
        $requestId = Util::randChar(16);
        $request->setParam('request_id', strtoupper($requestId));

        $ip = $request->input('ip');
        //统计在线IP
        self::countOnlineIP($ip);
        //检查用户请求频率
        if (!SecureService::CheckViolenceRequest($ip)){
            echo json_encode(Response::fake(MessageCode::FAKE_REQUEST_ERROR));
            die();
        }
    }

    public static function countOnlineIP($ip){
        $onlineKey = RedisKey::getOnlineKey($ip);
        $redis = new  Redis();
        $redis->setex($onlineKey, 1800, 1);
        $redis->incr(RedisKey::VISIT);
    }



}