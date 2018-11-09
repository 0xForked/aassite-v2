<?php


use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class CreateArticleTable extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $user = $this->table('articles');
        $user->addColumn('author', 'string',  ['limit' => 150])
              ->addColumn('slug', 'string', ['limit' => 150])
              ->addColumn('title', 'string', ['limit' => 150])
              ->addColumn('body', 'string',  ['limit' => MysqlAdapter::TEXT_REGULAR])
            //   ->addColumn('image', 'string', ['limit' => 50])
              ->addColumn('status', 'integer',  ['limit' => MysqlAdapter::INT_TINY])
              // 0 draft, 1 published, 2 featured
              ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'null' => true])
              ->addColumn('updated_at', 'datetime')
              ->save();

              $this->execute('ALTER TABLE `articles` MODIFY COLUMN `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');

    }

    /**
     * Migrate Down.
     */
    public function down()
    {

    }
}
