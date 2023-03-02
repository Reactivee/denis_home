<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%options}}`.
 */
class m230301_102115_create_options_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%options}}', [
            'id' => $this->primaryKey(),
            'title_tr' => $this->string(),
            'title_ru' => $this->string(),
            'title_en' => $this->string(),
            'icon' => $this->string(),
            'weight' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createTable('{{%option_values}}', [
            'id' => $this->primaryKey(),
            'option_id' => $this->integer(),
            'value_tr' => $this->string(),
            'value_ru' => $this->string(),
            'value_en' => $this->string(),
            'icon' => $this->string(),
            'weight' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);


        // creates index for column `category_id`
        $this->createIndex(
            'idx-option_values-option_id',
            'option_values',
            'option_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-option_values-option_id',
            'option_values',
            'option_id',
            'options',
            'id'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%options}}');
    }
}
