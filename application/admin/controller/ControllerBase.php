<?php
/**
 * ControllerBase.php.
 * @author keepeye <carlton.cheng@foxmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 */

namespace app\admin\controller;


use think\Controller;
use app\admin\component\AdminAuth;

class ControllerBase extends Controller
{
    protected $adminUser;

    protected $current_menu = 'admin/index/index';

    // 初始化
    protected function _initialize()
    {
        AdminAuth::instance()->checkLogin();
        $this->adminUser = AdminAuth::instance()->getUser();
        $this->assign('adminUser',$this->adminUser);
        $this->assign('current_menu',$this->current_menu);
    }
}