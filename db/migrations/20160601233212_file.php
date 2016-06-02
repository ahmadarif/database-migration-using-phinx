<?php

use Phinx\Migration\AbstractMigration;

class File extends AbstractMigration
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
        $file = $this->table('file');

        $file
            ->addColumn('name', 'string', ['null'=>false, 'limit'=>255])
            ->addColumn('path', 'text', ['null'=>false])
            ->addColumn('access', 'string', ['null'=>false, 'limit'=>6, 'default'=>'public'])
            ->addColumn('created', 'timestamp', ['null'=>false, 'default'=>'CURRENT_TIMESTAMP'])
            ->addColumn('created_by', 'integer', ['null'=>false, 'signed'=>false])
            ->addColumn('updated', 'timestamp', ['null'=>false, 'default'=>'CURRENT_TIMESTAMP'])
            ->addColumn('updated_by', 'integer', ['null'=>false, 'signed'=>false]);

        $file->addIndex(['created_by'], ['name'=>'creator']);
        $file->addIndex(['access'], ['name'=>'accessibility']);

        $file->create();
    }
}
