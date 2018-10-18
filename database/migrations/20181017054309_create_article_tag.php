<?php


use Phinx\Migration\AbstractMigration;


class CreateArticleTag extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $slide = $this->table('article_tag');
        $slide->addColumn('article_id', 'integer', ['null' => true])
              ->addColumn('tag_id', 'integer', ['null' => true])
              ->addForeignKey('article_id', 'articles', 'id', ['delete'=> 'SET_NULL', 'update'=> 'NO_ACTION'])
              ->addForeignKey('tag_id', 'tags', 'id', ['delete'=> 'SET_NULL', 'update'=> 'NO_ACTION'])
              ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {

    }
}
