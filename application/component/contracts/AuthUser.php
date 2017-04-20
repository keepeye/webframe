<?php
/**
 * AuthUser.php.
 * @author keepeye <carlton.cheng@foxmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 */

namespace app\component\contracts;


interface AuthUser
{
    /**
     * 用户登陆,成功返回用户对象,失败返回false
     *
     * @param string $identity 账户名
     * @param string $password 密码
     * @return \app\component\contracts\AuthUser|boolean
     */
    public static function login($identity,$password);

    /**
     * 根据用户唯一id获取用户对象
     *
     * @param string $identity
     * @return \app\component\contracts\AuthUser
     */
    public static function findByIdentity($identity);

    /**
     * 获取用户唯一id
     *
     * @return string
     */
    public function getIdentity();

    /**
     * 检查当前用户密码是否正确
     *
     * @param $password
     * @return mixed
     */
    public function checkPassword($password);
}