<?php


use Phinx\Migration\AbstractMigration;

class CreateCategoryTable extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $category = $this->table('categories');
        $category->addColumn('title', 'string', ['limit' => 100, 'null' => true])
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
