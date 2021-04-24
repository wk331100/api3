<?php
namespace App\Libs;

class MessageCode {

    # 正常
    const UNDEFINED_ERROR               = 100;  # 未知错误
    const FAKE_REQUEST_ERROR            = 101;  # 非法请求
    const FAKE_INJECT_ERROR             = 102;  # 非法写入
    const SUCCESS                       = 200;  # 成功
	const FAILED                        = 201;  # 并非请求接口失败,表示数据为空,失败
    const SYSTEM_ERROR                  = 250;  # 系统错误 请联系管理员
    const ILLEGAL_PARAMETERS            = 400;  # 非法参数
    const PARAMETERS_ERROR              = 401;  # 参数缺失
	const NO_PERMISSION                 = 403;  # 无权限访问
    const ILLEGAL_REQUEST               = 404;  # 非法请求
    const IMAGE_EXTENSION_ERROR         = 405;  # 图片格式错误
    const SUBMIT_ERROR                  = 406;  # 请勿频繁提交

    const INVALID_TOOL                  = 1000; # 非法工具
    const INVALID_TYPE                  = 1001; # 非法类型
    const INVALID_TEXT                  = 1002; # 内容错误
    const INVALID_CHAR                  = 1003; # 使用字符错误
    const INVALID_LEN                   = 1004; # 选择长度错误
    const INVALID_LEN_OUT               = 1005; # 长度超过限制

    const PASSWORD_REPEAT_ERR           = 2000; #密码不一致
    const EMAIL_EXIST                   = 2001; #邮箱已存在
    const USER_NOT_EXIST                = 2002; #用户不存在
    const PASSWORD_ERROR                = 2003; #密码不正确





    #  ============== 业务层自定义Message ================
    private static $message = [
	    100                 => '未知错误',
        101                 => '请勿短时间内多次请求!',
        102                 => '请勿短时间内多次写入!',
	    200                 => '成功',
	    201                 => '失败',
	    202                 => '暂无数据',
	    250                 => '系统错误，请联系管理员',
	    400                 => '非法参数',
        401                 => '参数缺失',
	    403                 => '无权限访问',
	    404                 => '非法请求',
        405                 => '图片格式错误',
        406                 => '请勿频繁提交',

        1000                => '非法工具',
        1001                => '非法类型',
        1002                => '内容错误',
        1003                => '使用字符错误',
        1004                => '选择长度错误',
        1005                => '长度超过限制',

        2000                => '两次密码不一致',
        2001                => '邮箱已被注册',
        2002                => '用户不存在',
        2003                => '密码不正确',


    ];


	/**
	 * 获取错误码中文信息
	 * @param $code
	 * @return mixed
	 */
    public static function getMessage($code){
        return isset(self::$message[$code]) ? self::$message[$code] : self::$message[self::UNDEFINED_ERROR];
    }



}
