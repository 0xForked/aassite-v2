<?php


use Phinx\Migration\AbstractMigration;

class CreateProjectTag extends AbstractMigration
{
    public function up()
    {
        $slide = $this->table('project_tag');
        $slide->addColumn('project_id', 'integer', ['null' => true])
              ->addColumn('tag_id', 'integer', ['null' => true])
              ->addForeignKey('project_id', 'projects', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])
              ->addForeignKey('tag_id', 'tags', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])
              ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {

    }
}
