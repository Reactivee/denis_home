<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%complex_options}}`.
 */
class m230303_115658_create_complex_options_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%complex_options}}', [
            'id' => $this->primaryKey(),
            'option_id' => $this->integer(),
            'complex_id' => $this->integer(),
            'value_id' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-complex_options-complex_id',
            'complex_options',
            'complex_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-complex_options-complex_id',
            'complex_options',
            'complex_id',
            'complexes',
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'idx-complex_options-option_id',
            'complex_options',
            'option_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-complex_options-option_id',
            'complex_options',
            'option_id',
            'options',
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'idx-complex_options-value_id',
            'complex_options',
            'value_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-complex_options-value_id',
            'complex_options',
            'value_id',
            'option_values',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%complex_options}}');
    }
}
