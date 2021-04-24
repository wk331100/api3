<?php
namespace App\Services;

use App\Exceptions\ServiceException;
use App\Libs\MessageCode;
use App\Libs\Util;
use App\Models\UserModel;
use System\Session;

class UserService{

    public static function create($params){
        //防暴力注册
        if(!SecureService::CheckViolenceInjection($params['ip'])){
            throw new ServiceException(MessageCode::FAKE_INJECT_ERROR);
        }

        if( $params['password'] != $params['password_repeat']) {
            throw new ServiceException(MessageCode::PASSWORD_REPEAT_ERR);
        }

        if (UserModel::getInstance()->checkEmailExist($params['email'])) {
            throw new ServiceException(MessageCode::EMAIL_EXIST);
        }

        $randChar = Util::randChar();
        $insertData = [
            'email' => $params['email'],
            'rand_char' => $randChar,
            'password' => Util::makePassword($params['password'], $randChar),
        ];
        return UserModel::getInstance()->create($insertData);
    }

    public static function login($params){
        $info = UserModel::getInstance()->getInfoByEmail($params['email']);
        if (empty($info)){
            throw new ServiceException(MessageCode::USER_NOT_EXIST);
        }

        $password = Util::makePassword($params['password'], $info->rand_char);
        if ($password != $info->password){
            throw new ServiceException(MessageCode::PASSWORD_ERROR);
        }

        //登录成功写入Session
        self::removeSecureColumns($info);
        Session::set('user', $info);
        return true;
    }

    /**
     * 移除敏感信息
     * @param $info
     */
    public static function removeSecureColumns($info){
        $secureKeys = [
            'password','rand_char'
        ];

        if(is_array($info)) {
            foreach ($secureKeys as $key) {
                if (isset($info[$key])) {
                    unset($info[$key]);
                }
            }
        }

        if(is_object($info)) {
            foreach ($secureKeys as $key) {
                if (isset($info->$key)) {
                    unset($info->$key);
                }
            }
        }
    }



}