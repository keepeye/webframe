<?php
/**
 * SysuserController.php.
 * @author keepeye <carlton.cheng@foxmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 */

namespace app\admin\controller;


use app\common\model\AdminUser;

class SysuserController extends ControllerBase
{
    protected $current_menu = 'admin/sysuser/index';

    public function index()
    {
        $list = (new AdminUser())->order('id','desc')->paginate(30);
        return $this->fetch('index',['list'=>$list]);
    }

    public function add()
    {
        if (!$this->request->isPost()) {
            return $this->fetch('edit');
        }
        $data = $this->request->post();

        //插入数据库
        $obj = new AdminUser();
        $re = $obj->save($data);
        if (false === $re) {
            $this->error($obj->getError());
        }
        $this->redirect('index');
    }

    public function edit()
    {
        $id = $this->request->param('id');
        if (!$id || ! $obj = (new AdminUser())->where('id',$id)->find()) {
            $this->error('记录不存在');
        }

        if (!$this->request->isPost()) {
            return $this->fetch('edit',['data'=>$obj]);
        }

        $data = $this->request->post();
        if (isset($data['password']) && $data['password'] == '') {
            unset($data['password'],$data['repeat_password']);
        }
        $re = $obj->validate('common/AdminUser.edit')->save($data);
        if (false === $re) {
            $this->error($obj->getError());
        }
        $this->success('修改成功','index');
    }

    //删除
    public function delete()
    {
        $id = $this->request->param('id');
        if (!$id || ! $obj = (new AdminUser())->where('id',$id)->find()) {
            $this->error('用户不存在或已被删除');
        }

        //删除
        $re = $obj->delete();
        if (false === $re) {
            $this->error($obj->getError());
        }
        $this->success("删除成功");
    }
}
