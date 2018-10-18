<?php


use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class CreateMessageTable extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $message = $this->table('messages');
        $message->addColumn('name', 'string', ['limit' => 150, 'null' => true])
              ->addColumn('email', 'string', ['limit' => 150, 'null' => true])
              ->addColumn('title', 'string', ['limit' => 150, 'null' => true])
              ->addColumn('body', 'string',  ['limit' => MysqlAdapter::TEXT_REGULAR])
              ->addColumn('status', 'integer',  ['limit' => MysqlAdapter::INT_TINY])
              // 1 replied, 0 unreplied
              ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {

    }
}
