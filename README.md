网站框架
=========

基于 tp5 ，基本的后台框架，含后台用户登陆

使用教程

0. 进入项目根目录执行 `composer install` 
1. 修改 .env ，设置数据库信息
2. 执行 `./think migrate:run`
3. 执行 `./think seed:run`
4. 进入后台 `/admin/index/index`


后台菜单修改: `admin/config.php` 里的 `admin_menus`

