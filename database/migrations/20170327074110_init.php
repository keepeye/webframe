<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Init extends Migrator
{
    public function up()
    {
        \think\Db::execute(file_get_contents(__DIR__.'/../init.sql'));
    }

    public function down()
    {

    }
}
