<?php


use Phinx\Migration\AbstractMigration;

class CreateCategoryProject extends AbstractMigration
{
    public function up()
    {
        $slide = $this->table('category_project');
        $slide->addColumn('project_id', 'integer', ['null' => true])
              ->addColumn('category_id', 'integer', ['null' => true])
              ->addForeignKey('project_id', 'projects', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])
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
