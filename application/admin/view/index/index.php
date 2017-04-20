{extend name="base" /}

{block name="content"}
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                系统信息
            </div>
            <div class="panel-body">
                <dl>
                    <dl><b>程序版本号：</b> {:config('app_version')}</dl>
                    <dl><b>框架/版本号：</b>ThinkPHP/{$Think.THINK_VERSION}</dl>
                    <dl><b>PHP版本号：</b>{$Think.PHP_VERSION}</dl>
                    <dl><b>服务器系统：</b>{$Think.PHP_OS} {$Think.PHP_INT_SIZE * 8}位</dl>
                    <dl><b>数据库版本：</b>{$mysql_version}</dl>
                </dl>
            </div>
        </div>
    </div>
</div>
{/block}