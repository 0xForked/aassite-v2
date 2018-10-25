<?php


use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class CreateDiscussionTable extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $discussion = $this->table('discussions');
        $discussion->addColumn('creator', 'string',  ['limit' => 150])
              ->addColumn('slug', 'string', ['limit' => 150])
              ->addColumn('title', 'string', ['limit' => 150])
              ->addColumn('body', 'string',  ['limit' => MysqlAdapter::TEXT_REGULAR])
              ->addColumn('status', 'integer',  ['limit' => MysqlAdapter::INT_TINY])
              // 0 closed, 1 hold, 2 published, 3 important
              ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'null' => true])
              ->addColumn('updated_at', 'datetime')
              ->save();

              $this->execute('ALTER TABLE `discussions` MODIFY COLUMN `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');

    }

    /**
     * Migrate Down.
     */
    public function down()
    {

    }
}
