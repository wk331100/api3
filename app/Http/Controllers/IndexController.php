<?php

namespace App\Http\Controllers;

use App\Exceptions\ServiceException;
use App\Libs\Constants;
use App\Libs\MessageCode;
use App\Services\UserService;
use System\Flash;
use System\Redirect;
use System\Request;
use System\Response;
use System\Validator;

class IndexController extends Controller {

    public function index(Request $request){

        return Response::view("index", $this->data);
    }

    public function login(Request $request){
        if ($request->isPost()) {
            try {
                $params = $request->all();
                $validate = Validator::make($params, [
                    'email' => 'required|email',
                    'password' => 'required|between:6,20',
                ]);
                if($validate->fails()){
                    throw new ServiceException(MessageCode::ILLEGAL_PARAMETERS);
                }

                if (UserService::login($params)) {
                    Flash::set(Constants::SUCCESS, "登录成功！");
                }
                Redirect::to('/');
            } catch (ServiceException $e){
                Flash::set(Constants::ERROR, $e->getMessage());
                Redirect::to('/login');
            }
        }

        return Response::view("login", $this->data);
    }

    public function register(Request $request){
        if ($request->isPost()) {
            try {
                $params = $request->all();
                $validate = Validator::make($params, [
                    'email' => 'required|email',
                    'password' => 'required|between:6,12',
                    'password_repeat' => 'required|between:6,12',
                ]);
                if($validate->fails()){
                    throw new ServiceException(MessageCode::ILLEGAL_PARAMETERS);
                }

                if (UserService::create($params)) {
                    Flash::set(Constants::SUCCESS, "注册成功！");
                }
                Redirect::to('/login');
            } catch (ServiceException $e){
                Flash::set(Constants::ERROR, $e->getMessage());
                Redirect::to('/register');
            }
        }

        return Response::view("register", $this->data);
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