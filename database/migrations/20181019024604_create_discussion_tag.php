<?php


use Phinx\Migration\AbstractMigration;

class CreateDiscussionTag extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $slide = $this->table('discussion_tag');
        $slide->addColumn('discussion_id', 'integer', ['null' => true])
              ->addColumn('tag_id', 'integer', ['null' => true])
              ->addForeignKey('discussion_id', 'discussions', 'id', ['delete'=> 'SET_NULL', 'update'=> 'NO_ACTION'])
              ->addForeignKey('tag_id', 'tags', 'id', ['delete'=> 'SET_NULL', 'update'=> 'NO_ACTION'])
              ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {

    }
}
