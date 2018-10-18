<?php


use Phinx\Migration\AbstractMigration;


class CreateArticleCategory extends AbstractMigration
{
     /**
     * Migrate Up.
     */
    public function up()
    {
        $slide = $this->table('article_category');
        $slide->addColumn('article_id', 'integer', ['null' => true])
              ->addColumn('category_id', 'integer', ['null' => true])
              ->addForeignKey('article_id', 'articles', 'id', ['delete'=> 'SET_NULL', 'update'=> 'NO_ACTION'])
              ->addForeignKey('category_id', 'categories', 'id', ['delete'=> 'SET_NULL', 'update'=> 'NO_ACTION'])
              ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {

    }
}
