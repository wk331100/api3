<?php
namespace App\Http\Controllers;

use App\Libs\Constants;
use System\Flash;

class Controller{

    public $data;

    function __construct()
    {
        $this->data = [
            'success' => Flash::get(Constants::SUCCESS),
            'error' =>  Flash::get(Constants::ERROR),
            'title' => 'API3 接口管理系统',
            'meta_key' => '',
            'meta_desc' => ''
        ];
    }

}