
<!DOCTYPE html>
<html>
<head>
    <title>{$Think.config.site_title}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Bootstrap -->
    <link href="/static/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="/static/admin/css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    {block name="head"}{/block}
</head>
<body>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <!-- Logo -->
                <div class="logo">
                    <h1><a href="{url('admin/index/index')}">{$Think.config.site_title}</a></h1>
                </div>
            </div>

            <div class="col-md-2 col-md-offset-5">
                <div class="navbar navbar-inverse" role="banner">
                    <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{$adminUser->username} <b class="caret"></b></a>
                                <ul class="dropdown-menu animated fadeInUp">
                                    <li><a href="{:url('admin/auth/logout')}">注销</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" >
    <div class="row">
        <div class="col-md-2">
            <div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    {foreach name="$Think.config.admin_menus" id="item"}
                    {if condition="isset($item.sub_menus)"}
                    <li class="submenu">
                        <a href="javascript:">
                            <i class="{$item.icon}"></i> {$item.text}
                            <span class="caret pull-right"></span>
                        </a>
                        <ul>
                            {foreach name="$item.sub_menus" id="subItem"}
                            <li {eq name="$subItem.url" value="$current_menu"}class="current"{/eq}><a href="{:url($subItem.url)}">{$subItem.text}</a></li>
                            {/foreach}
                        </ul>
                    </li>
                    {else /}
                    <li {eq name="$item.url" value="$current_menu"}class="current"{/eq}><a href="{:url($item.url)}"><i class="{$item.icon}"></i> {$item.text}</a></li>
                    {/if}
                    {/foreach}
                </ul>
            </div>
        </div>
        <div class="col-md-10">
            {block name="content"}{/block}
        </div>
    </div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/static/js/jquery-1.11.1.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/static/bootstrap/js/bootstrap.min.js"></script>
<script src="/static/admin/js/custom.js"></script>

{block name="script"}{/block}
</body>
</html>