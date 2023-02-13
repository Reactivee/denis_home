<?php

use yii\db\Migration;

/**
 * Class m220628_065336_first_tables
 */
class m220628_065336_first_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('top_banner', [
            'id' => $this->primaryKey(),
            'title_uz' => $this->string(),
            'title_ru' => $this->string(),
            'title_en' => $this->string(),
            'text_uz' => $this->string(),
            'text_ru' => $this->string(),
            'text_en' => $this->string(),
            'status' => $this->integer(),
            'link' => $this->string(),
            'img_path' => $this->string(),
        ]);
        $this->createTable('application', [
            'id' => $this->primaryKey(),
            'email' => $this->string(),
            'phone' => $this->string(),
            'text' => $this->text(),
            'updated_at' => $this->integer(),
            'created_at' => $this->integer(),
        ]);
        $this->createTable('address', [
            'id' => $this->primaryKey(),
            'address_uz' => $this->string(),
            'address_ru' => $this->string(),
            'address_en' => $this->string(),
            'fax' => $this->string(),
            'phone' => $this->string(),
            'email' => $this->string(),
            'text' => $this->string(),

        ]);
        $this->createTable('about', [
            'id' => $this->primaryKey(),
            'title_uz' => $this->string(),
            'title_ru' => $this->string(),
            'title_en' => $this->string(),
            'text_en' => $this->text(),
            'text_uz' => $this->text(),
            'text_ru' => $this->text(),
            'img' => $this->string(),
            'link' => $this->string(),
        ]);
        $this->createTable('advantages', [
            'id' => $this->primaryKey(),
            'title_uz' => $this->string(),
            'title_ru' => $this->string(),
            'title_en' => $this->string(),
            'text_en' => $this->string(),
            'text_uz' => $this->string(),
            'text_ru' => $this->string(),
        ]);
        $this->createTable('advantages_icons', [
            'id' => $this->primaryKey(),
            'title_uz' => $this->string(),
            'title_ru' => $this->string(),
            'title_en' => $this->string(),
            'img' => $this->string(),
            'link' => $this->string(),
        ]);
        $this->createTable('gallery', [
            'id' => $this->primaryKey(),
            'img' => $this->string(),
            'link' => $this->string(),
        ]);
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'name_uz' => $this->string(),
            'name_ru' => $this->string(),
            'name_en' => $this->string(),
            'slug' => $this->string(),
            'image' => $this->string(),
            'type' => $this->string(),
            'sort' => $this->string(),
            'desc' => $this->string(),
        ]);
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'title_uz' => $this->string(),
            'title_ru' => $this->string(),
            'title_en' => $this->string(),
            'category_id' => $this->integer(),
            'slug' => $this->string(),
            'image' => $this->string(),
            'type' => $this->string(),
        ]);
        $this->createTable('sorts', [
            'id' => $this->primaryKey(),
            'title_uz' => $this->string(),
            'title_ru' => $this->string(),
            'title_en' => $this->string(),
            'desc' => $this->string(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220628_065336_first_tables cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220628_065336_first_tables cannot be reverted.\n";

        return false;
    }
    */
}
