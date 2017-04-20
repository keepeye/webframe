<?php
/**
 * AdminAuth.php.
 * @author keepeye <carlton.cheng@foxmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 */

namespace app\admin\component;


use app\component\Auth;

class AdminAuth extends Auth
{
    /**
     * @var string
     */
    protected $loginRoute = "/admin/auth/login";

    /**
     * 模型类
     *
     * @var string
     */
    protected $modelClass = 'app\\common\\model\\AdminUser';

    /**
     * session 键名
     *
     * @var string
     */
    protected $sessionKey = 'admin_uid';
}