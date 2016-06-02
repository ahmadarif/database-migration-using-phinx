<?php

use Phinx\Migration\AbstractMigration;

class Message extends AbstractMigration
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
        $message = $this->table('message');

        $message
            ->addColumn('content', 'text', ['null'=>false])
            ->addColumn('attachments', 'text')
            ->addColumn('created', 'timestamp', ['null'=>false, 'default'=>'CURRENT_TIMESTAMP'])
            ->addColumn('created_by', 'integer', ['signed'=>false, 'null'=>false]);

        $message->addIndex(['created_by'], ['name'=>'creator']);

        $message->create();
    }
}
