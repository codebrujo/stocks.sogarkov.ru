<?php

use yii\db\Migration;

/**
 * Class m180730_182916_add_chapter_table
 */
class m180730_182916_add_chapter_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('chapter', [
            'id' => $this->primaryKey(),
            'name' => $this->string(250)->notNull(),
            'description' => $this->text(),
        ]);

        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'chapter_id' => $this->integer(),
            'name' => $this->string(250)->notNull(),
            'description' => $this->text(),
        ]);

        $this->addForeignKey('fk_category_chapter', 'category', 'chapter_id', 'chapter', 'id');

        $this->createTable('article', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'name' => $this->string(250)->notNull(),
            'content' => $this->text(),
        ]);

        $this->addForeignKey('fk_article_category', 'article', 'category_id', 'category', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180730_182916_add_chapter_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180730_182916_add_chapter_table cannot be reverted.\n";

        return false;
    }
    */
}
