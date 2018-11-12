<?php


use Phinx\Migration\AbstractMigration;

class CreateCategoryDiscussion extends AbstractMigration
{
     /**
     * Migrate Up.
     */
    public function up()
    {
        $slide = $this->table('category_discussion');
        $slide->addColumn('discussion_id', 'integer', ['null' => true])
              ->addColumn('category_id', 'integer', ['null' => true])
              ->addForeignKey('discussion_id', 'discussions', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])
              ->addForeignKey('category_id', 'categories', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])
              ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {

    }
}
