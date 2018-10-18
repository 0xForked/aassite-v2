<?php


use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class CreateSettingDetail extends AbstractMigration
{

    public function up()
    {
        $slide = $this->table('settings');
        $slide->addColumn('facebook', 'string', ['limit' => 100, 'null' => true])
              ->addColumn('twitter', 'string', ['limit' => 150, 'null' => true])
              ->addColumn('linkedin', 'string', ['limit' => 150, 'null' => true])
              ->addColumn('github', 'string', ['limit' => 150, 'null' => true])
              ->addColumn('email', 'string', ['limit' => 150, 'null' => true])
              ->addColumn('phone', 'string', ['limit' => 150, 'null' => true])
              ->addColumn('address', 'string', ['limit' => 150, 'null' => true])
              ->addColumn('site_url', 'string', ['limit' => 150, 'null' => true])
              ->addColumn('site_name', 'string', ['limit' => 150, 'null' => true])
              ->addColumn('site_description', 'string', ['limit' => 150, 'null' => true])
              ->addColumn('site_email', 'string', ['limit' => 150, 'null' => true])
              ->addColumn('status', 'integer',  ['limit' => MysqlAdapter::INT_TINY])
              // 0 disable MT MODE, 1 enable MT MODE
              ->save();
    }

    public function down()
    {

    }
}
