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
use eftec\bladeone\BladeOne;

class IndexController extends Controller {

    public function index(Request $request){

        dd($request->all());
    }

    public function login(Request $request){
        $data = [];
        return Response::view("login", $data);
    }

    public function register(Request $request){
        $data = [];
        return Response::html("register", $data);
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