<?php

namespace app\common\model;

use app\component\contracts\AuthUser;
use think\Model;

/**
 * 后台用户类
 *
 * 需要实现 \app\component\contracts\AuthUser 接口
 *
 * @package app\common\model
 */
class AdminUser extends Model implements AuthUser
{
    /**
     * @inheritdoc
     */
    protected $table = 'admin_users';

    protected $field = true;

    protected $validate = 'common/AdminUser';

    public static function init()
    {
        static::event('before_insert', [static::class,'onInsert']);
    }

    /**
     * @inheritdoc
     */
    public static function login($username,$password)
    {
        $user = static::get(['username'=>$username]);
        if (!$user) {
            return false;
        }
        if (!$user->checkPassword($password)) {
            return false;
        }
        //更新登陆时间、ip
        $user->setAttr('last_login_ip',request()->ip());
        $user->setAttr('last_login_time',date('Y-m-d H:i:s'));
        $re = $user->save();
        if ($re === false) {
            throw new \Exception($user->getError());
        }
        return $user;
    }

    /**
     * @inheritdoc
     */
    public static function findByIdentity($identity)
    {
        $user = static::get(['id'=>$identity]);
        if (!$user) {
            return null;
        }
        return $user;
    }

    /**
     * @inheritdoc
     */
    public function getIdentity()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function checkPassword($password)
    {
        return $this->password == xz_hash($password);
    }

    public function setPasswordAttr($value)
    {
        return xz_hash($value);
    }

    protected static function onInsert(Model $obj)
    {
        $obj->setAttr('created_at',date('Y-m-d H:i:s'));
    }
}
