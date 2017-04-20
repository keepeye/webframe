{extend name="base" /}

{block name="content"}
<div class="content-box content-box-large">
    <div class="panel-heading">
        <h4><?=isset($data)?'修改':'添加';?>系统用户</h4>
    </div>
    <div class="panel-body">
        <form action="" method="post">
            {if condition="isset($data)"}
            <input type="hidden" name="id" value="{$data.id}">
            {/if}
            <div class="form-group">
                <label>用户名</label>
                <input type="text" class="form-control" name="username" value="{$data.username ?? ''}" placeholder="请填写用户名，6-15个字符，允许英文、数字、下划线">
            </div>
            <div class="form-group">
                <label>密码</label>
                <input type="text" class="form-control" name="password" placeholder="{:isset($data) ? '留空则不修改':'请填写密码'}">
            </div>
            <div class="form-group">
                <label>重复密码</label>
                <input type="text" class="form-control" name="repeat_password" placeholder="请和密码保持一致">
            </div>
            <button type="submit" class="btn btn-primary">提交</button>
        </form>
    </div>
</div>
{/block}