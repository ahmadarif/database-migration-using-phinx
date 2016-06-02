<?php

use Phinx\Db\Adapter\MysqlAdapter;
use Phinx\Migration\AbstractMigration;

class CreatePostTable extends AbstractMigration
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
    // not null itu sudah default
    public function change()
    {
        $post = $this->table('post');

        $post
            ->addColumn('title', 'string')
            ->addColumn('content', 'text', ['limit'=>MysqlAdapter::TEXT_LONG])
            ->addColumn('created', 'datetime', ['null'=>false])
            ->addColumn('updated', 'datetime', ['null'=>true]);

        $post->addIndex(['title'], ['unique'=>true]);

        $post->create();        
    }
}
