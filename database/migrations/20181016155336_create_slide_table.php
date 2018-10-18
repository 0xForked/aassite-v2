<?php


use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class CreateSlideTable extends AbstractMigration
{
        /**
     * Migrate Up.
     */
    public function up()
    {
        $slide = $this->table('slides');
        $slide->addColumn('title', 'string', ['limit' => 100, 'null' => true])
              ->addColumn('desc', 'string', ['limit' => 150, 'null' => true])
              ->addColumn('status', 'integer',  ['limit' => MysqlAdapter::INT_TINY])
                // 0 draft, 1 published, 2 featured
              ->addColumn('link', 'string', ['limit' => 150, 'null' => true])
              ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {

    }
}
