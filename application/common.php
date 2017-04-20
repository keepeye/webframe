<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Config;

// 应用公共文件

//字符串hash
function xz_hash($str)
{
    $salt = Config::get('hash_salt');
    $str .= $salt.$str;
    return md5($str);
}

//验证hash
function xz_hash_verify($hash, $str)
{
    return $hash == xz_hash($str);
}

//html标签助手函数
function html_input_text($name, $value, $attributes = [])
{
    return \app\component\Html::getInstance()->inputText($name, $value, $attributes);
}

function html_select($name,$value,$options,$attributes = [])
{
    return \app\component\Html::getInstance()->select($name, $value, $options, $attributes);
}

