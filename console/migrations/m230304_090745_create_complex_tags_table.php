<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%complex_tags}}`.
 */
class m230304_090745_create_complex_tags_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%complex_tags}}', [
            'id' => $this->primaryKey(),
            'complex_id' => $this->integer(),
            'tag_id' => $this->integer(),
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            'idx-complex_tags-complex_id',
            'complex_tags',
            'complex_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-complex_tags-complex_id',
            'complex_tags',
            'complex_id',
            'complexes',
            'id'
        );
        // creates index for column `category_id`
        $this->createIndex(
            'idx-complex_tags-tag_id',
            'complex_tags',
            'tag_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-complex_tags-tag_id',
            'complex_tags',
            'tag_id',
            'tags',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%complex_tags}}');
    }
}
