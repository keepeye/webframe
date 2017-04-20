<?php

use think\migration\Seeder;

class AdminUsersSeeder extends Seeder
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $adminUser = $this->table('admin_users');
        $adminUser->insert([
            [
                'username' => 'admin',
                'password' => xz_hash('admin'),
                'created_at' => date('Y-m-d H:i:s')
            ]
        ])->save();
    }
}