<?php

use Phinx\Migration\AbstractMigration;

class AddSingleUser extends AbstractMigration
{
    public function up()
    {
        $data = [
            'username' => 'ahmadarif',
            'password' => md5('123'),
            'gender' => 'L'
        ];
        $this->insert('user', $data);
    }

    public function down()
    {
        $this->execute('TRUNCATE user');
    }
}
