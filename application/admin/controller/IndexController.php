<?php
namespace app\admin\controller;

use think\Db;

class IndexController extends ControllerBase
{
    public function index()
    {
        $re = Db::query("SELECT VERSION() as mysql_version");
        $this->assign('mysql_version',$re[0]['mysql_version']);
        return $this->fetch('index');
    }
}
