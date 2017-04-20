<?php
namespace app\admin\controller;

use app\admin\component\AdminAuth;
use think\Controller;

class AuthController extends Controller
{
    //登陆
    public function login()
    {
        if (!$this->request->isPost()) {
            return $this->fetch('login');
        }
        //检测用户名密码
        $username = $this->request->post('username');
        $password = $this->request->post('password');
        $auth = AdminAuth::instance();
        if ($user = $auth->login($username,$password)) {
            $auth->persist($user);
            //登陆成功
            $auth->back('admin/index/index');
        } else {
            $this->error("用户名或密码错误");
        }
    }

    //登出
    public function logout()
    {
        $auth = AdminAuth::instance();
        $auth->logout();
        return redirect('admin/index/index');
    }
}