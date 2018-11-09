<?php


use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class CreateProjectTable extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $project = $this->table('projects');
        $project->addColumn('author', 'string',  ['limit' => 150])
                ->addColumn('slug', 'string', ['limit' => 150])
                ->addColumn('title', 'string', ['limit' => 150])
                ->addColumn('desc', 'string', ['limit' => 150])
                // ->addColumn('image', 'string', ['limit' => 50])
                ->addColumn('status', 'integer',  ['limit' => MysqlAdapter::INT_TINY])
                // 0 draft, 1 published, 2 featured
                ->addColumn('link_store_google', 'string', ['limit' => 150, 'null' => true])
                ->addColumn('link_store_apple', 'string', ['limit' => 150, 'null' => true])
                ->addColumn('link_url_web', 'string', ['limit' => 150, 'null' => true])
                ->addColumn('link_github', 'string', ['limit' => 150, 'null' => true])
                ->addColumn('user_guide', 'string', ['limit' => 150, 'null' => true])
                ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {

    }
}
