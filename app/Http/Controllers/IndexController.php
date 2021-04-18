<?php

namespace App\Http\Controllers;

use App\Libs\Util;
use App\Models\InviteCodeModel;
use App\Models\ToolsModel;
use App\Models\UserModel;
use App\Services\QRcodeService;
use App\Services\ToolService;
use System\Redirect;
use System\Request;
use System\Response;

class IndexController extends Controller {

    public function index(Request $request){

        dd($request->all());
    }

    public function tools(Request $request){
        $data = [
            'list' => ToolService::getToolList(),
            'type' => ToolService::getTypeList(),
            'desc' => '工具箱列表',
            'meta_key' => ToolService::getToolMetaKey(),
            'meta_desc' => ToolService::META_DESC,
        ];
        $data = ToolService::bindExtData($data, $request);
        return Response::html("tools", $data);
    }




}