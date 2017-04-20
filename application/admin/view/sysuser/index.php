{extend name="base" /}

{block name="content"}
<div class="content-box content-box-large">
    <div class="panel-heading">
        <div class="panel-title">系统用户列表</div>
    </div>
    <div class="panel-toolbox">
        <a class="btn btn-primary" href="{:url('add')}"><span class="glyphicon glyphicon-plus"></span> 添加</a>
    </div>
    <div class="panel-body">
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped">
            <thead>
            <tr>
                <th>uid</th>
                <th>用户名</th>
                <th>上次登陆ip</th>
                <th>上次登陆时间</th>
                <th>禁用</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            {foreach name="list" id="item"}
            <tr>
                <td>{$item.id}</td>
                <td>{$item.username}</td>
                <td>{$item.last_login_ip}</td>
                <td>{$item.created_at}</td>
                <td>{$item.is_delete == 1 ? '<font color="red">是</font>' : '否'}</td>
                <td>
                    <a href="{:url('edit',['id'=>$item.id])}">编辑</a>
                    <a href="{:url('delete',['id'=>$item.id])}" onclick="return confirm('确定要删除用户吗?不可恢复！')">删除</a>
                </td>
            </tr>
            {/foreach}
            </tbody>
        </table>
        {$list->render()}
    </div>
</div>
{/block}