<?php
/**
 * AdminUser.php.
 * @author keepeye <carlton.cheng@foxmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 */

namespace app\common\validate;


use think\Validate;

class AdminUser extends Validate
{
    protected $rule = [
        'username' => 'require|length:5,32|unique:admin_user|regex:^[a-zA-z0-9_]+$',
        'password' => 'require',
        'repeat_password' => 'requireWith:password|confirm:password',
    ];

    protected $field = [
        'username' => '用户名',
        'password' => '密码',
        'repeat_password' => '重复密码',
    ];

    protected $message = [
        'username.regex'  => '用户名不合法',
        'repeat_password.confirm' => '密码和重复密码不一致',
        'repeat_password.requireWith' => '请填写重复密码'
    ];

    protected $scene = [
        'edit'  =>  ['username','repeat_password'],
    ];
}