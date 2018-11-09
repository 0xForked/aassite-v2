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
        $galley->addColumn('name', 'string', ['limit' => 50, 'null' => true])
                ->addColumn('folder', 'string', ['limit' => 50, 'null' => true])
                ->addColumn('ext', 'string', ['limit' => 50, 'null' => true])
                ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {

    }
}
