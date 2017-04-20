<?php
//配置文件
return [
    'site_title' => '后台管理系统',
    //后台菜单
    'admin_menus' => [
        [
            'text' => '后台首页',
            'url' => 'admin/index/index', //url是作为 Url::build 参数的
            'icon' => 'glyphicon glyphicon-home', //菜单图标
        ],
        [
            'text' => '系统管理',
            'url' => 'admin/settings/index',
            'icon' => 'glyphicon glyphicon-cog',
            'sub_menus' => [
                [
                    'text' => '系统用户',
                    'url' => 'admin/sysuser/index'
                ],
            ]
        ],
    ],
];