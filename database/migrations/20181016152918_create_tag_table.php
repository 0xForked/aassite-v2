<?php


use Phinx\Migration\AbstractMigration;

class CreateTagTable extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $tag = $this->table('tags');
        $tag->addColumn('title', 'string', ['limit' => 100, 'null' => true])
              ->addColumn('slug', 'string', ['limit' => 100, 'null' => true])
              ->addColumn('desc', 'string', ['limit' => 100, 'null' => true])
              ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {

    }
}
