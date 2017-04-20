<?php
/**
 * Auth.php.
 * @author keepeye <carlton.cheng@foxmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 */

namespace app\component;


use app\component\contracts\AuthUser;
use think\Cookie;
use think\exception\HttpResponseException;
use think\Request;
use think\Session;
use think\Url;

class Auth
{
    /**
     * @var string
     */
    protected $loginRoute = "/auth/login";

    /**
     * 模型类
     *
     * @var string
     */
    protected $modelClass = 'app\\common\\model\\User';

    /**
     * session 键名
     *
     * @var string
     */
    protected $sessionKey = 'uid';

    /**
     * 用户对象
     *
     * @var \app\component\contracts\AuthUser
     */
    protected $user;


    /**
     * 实例缓存
     *
     * @var array
     */
    protected static $_instance;


    /**
     * @return bool
     */
    public function checkLogin()
    {
        if (!$this->isLogin()) {
            $res = \redirect($this->loginRoute)->remember();
            throw new HttpResponseException($res);
        }
        return true;
    }

    //返回登陆前页面
    public function back($default)
    {
        $res = \redirect($default)->restore();
        throw new HttpResponseException($res);
    }

    /**
     * 登陆用户,返回用户信息
     *
     * @param string $identity 用户名
     * @param string $password 密码
     * @return bool
     */
    public function login($identity, $password)
    {
        $user = call_user_func([$this->modelClass,'login'],$identity,$password);
        if (!$user) {
            //登陆失败
            return false;
        }
        return $user;
    }

    //持久化用户登陆,通过session
    public function persist(AuthUser $user)
    {
        Session::set($this->sessionKey, $user->getIdentity());
    }

    //判断是否登陆
    public function isLogin()
    {
        return !!$this->getUser();
    }

    //获取登陆用户模型对象
    public function getUser()
    {
        if ($this->user) {
            return $this->user;
        }
        $identity = Session::get($this->sessionKey);
        if (!$identity) {
            return null;
        }
        $user = call_user_func([$this->modelClass,'findByIdentity'],$identity);
        if (!$user) {
            return null;
        }
        return $this->user = $user;
    }

    //注销
    public function logout()
    {
        Session::clear();
    }

    //实例化一个auth对象
    public static function instance()
    {
        if (self::$_instance) {
            return self::$_instance;
        }
        return self::$_instance = new static;
    }
}
