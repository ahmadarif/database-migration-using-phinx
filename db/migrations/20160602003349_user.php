<?php

use Phinx\Migration\AbstractMigration;

class User extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $user = $this->table('user');

        $user
            ->addColumn('username', 'string', ['null'=>false, 'limit'=>80])
            ->addColumn('password', 'string', ['null'=>false, 'limit'=>255])
            ->addColumn('gender', 'enum', ['null'=>false, 'values'=>['L', 'P'], 'default'=>'L']);

        $user->addIndex(['username'], ['unique'=>true]);

        $user->create();
    }
}
