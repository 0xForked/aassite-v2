<?php


use Phinx\Migration\AbstractMigration;

class CreateGalleryProject extends AbstractMigration
{
    public function up()
    {
        $slide = $this->table('gallery_project');
        $slide->addColumn('project_id', 'integer', ['null' => true])
              ->addColumn('gallery_id', 'integer', ['null' => true])
              ->addForeignKey('project_id', 'projects', 'id', ['delete'=> 'SET_NULL', 'update'=> 'NO_ACTION'])
              ->addForeignKey('gallery_id', 'galleries', 'id', ['delete'=> 'SET_NULL', 'update'=> 'NO_ACTION'])
              ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {

    }
}
