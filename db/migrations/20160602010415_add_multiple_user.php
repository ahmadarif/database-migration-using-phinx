<?php

use Phinx\Migration\AbstractMigration;

class AddMultipleUser extends AbstractMigration
{
    public function up()
    {
        $data = [
            [
                'username' => 'tialestari',
                'password' => md5('littlequeensha'),
                'gender' => 'P'
            ],
            [
                'username' => 'aboy',
                'password' => md5('aboy'),
                'gender' => 'L'
            ],
            [
                'username' => 'uye1',
                'password' => md5('123'),
                'gender' => 'M'
            ],
            [
                'username' => 'uye2',
                'password' => md5('123')
            ]
        ];

        $this->insert('user', $data);
    }

    public function down()
    {
        $this->execute('DELETE FROM user WHERE username="tialestari" OR username="aboy" OR username="uye1" OR username="uye2"');
    }
}
