<?php


use Phinx\Migration\AbstractMigration;

class CreateGalleryTable extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $galley = $this->table('galleries');
        $galley->addColumn('title', 'string', ['limit' => 100, 'null' => true])
              ->addColumn('folder', 'string', ['limit' => 100, 'null' => true])
              ->addColumn('name', 'string', ['limit' => 100, 'null' => true])
              ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {

    }
}
