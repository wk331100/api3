<?php
namespace System;

class Session {

    public static function set($key, $value){
        $_SESSION[$key] = $value;
    }

    public static function get($key) {
        return $_SESSION[$key];
    }

    public static function del($key){
        unset($_SESSION[$key]);
    }

    public static function flush(){
        session_destroy();
    }
}