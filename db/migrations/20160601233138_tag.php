<?php

use Phinx\Migration\AbstractMigration;

class Tag extends AbstractMigration
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
        // tab table
        $tag = $this->table('tag');
        
        $tag
            ->addColumn('name', 'string', ['null'=>false, 'limit'=>45])
            ->addColumn('description', 'text')
            ->addColumn('context', 'string', ['limit'=>25])
            ->addColumn('created', 'timestamp', ['null'=>false, 'default'=>'CURRENT_TIMESTAMP'])
            ->addColumn('created_by', 'integer', ['null'=>false, 'signed'=>false])
            ->addColumn('visibility', 'boolean', ['null'=>false, 'signed'=>false, 'default'=>1]);

        $tag->addIndex(['name', 'created_by', 'visibility'], ['unique'=>true, 'name'=>'name_creator_visible']);
        $tag->addIndex(['context']);

        $tag->create();


        // tag_relation table
        $tagRelation = $this->table('tag_relation', ['id'=>false, 'primary_key'=>['tag_id', 'entity_id', 'entity_type']]);

        $tagRelation
            ->addColumn('tag_id', 'integer', ['null'=>false])
            ->addColumn('entity_id', 'integer', ['null'=>false, 'signed'=>false])
            ->addColumn('entity_type', 'string', ['null'=>false, 'limit'=>45])
            ->addColumn('created', 'timestamp', ['null'=>false, 'default'=>'CURRENT_TIMESTAMP'])
            ->addColumn('created_by', 'integer', ['null'=>false, 'signed'=>false]);

        $tagRelation->addIndex(['tag_id']);
        $tagRelation->addIndex(['entity_id', 'entity_type'], ['name'=>'entity']);

        $tagRelation->addForeignKey('tag_id', 'tag', 'id', ['delete'=>'CASCADE', 'update'=>'NO_ACTION']);

        $tagRelation->create();
    }
}
