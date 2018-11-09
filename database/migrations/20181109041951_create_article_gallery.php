<?php


use Phinx\Migration\AbstractMigration;

class CreateArticleGallery extends AbstractMigration
{
    public function up()
    {
        $slide = $this->table('gallery_article');
        $slide->addColumn('article_id', 'integer', ['null' => true])
              ->addColumn('gallery_id', 'integer', ['null' => true])
              ->addForeignKey('article_id', 'articles', 'id', ['delete'=> 'SET_NULL', 'update'=> 'NO_ACTION'])
              ->addForeignKey('gallery_id', 'galleries', 'id', ['delete'=> 'SET_NULL', 'update'=> 'NO_ACTION'])
              ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {

    }
}
