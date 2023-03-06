<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%infrastructure}}`.
 */
class m230306_095931_create_infrastructure_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%infrastructure}}', [
            'id' => $this->primaryKey(),
            'title_tr' => $this->string(),
            'title_en' => $this->string(),
            'title_ru' => $this->string(),
            'icon' => $this->string(),
        ]);
        $this->createTable('{{%complex_infrastructure}}', [
            'id' => $this->primaryKey(),
            'complex_id' => $this->integer(),
            'infrastructure_id' => $this->integer(),
        ]);


        // creates index for column `category_id`
        $this->createIndex(
            'idx-complex_infrastructure-complex_id',
            'complex_infrastructure',
            'complex_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-complex_infrastructure-complex_id',
            'complex_infrastructure',
            'complex_id',
            'complexes',
            'id'
        );
        // creates index for column `category_id`
        $this->createIndex(
            'idx-complex_infrastructure-infrastructure_id',
            'complex_infrastructure',
            'infrastructure_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-complex_infrastructure-infrastructure_id',
            'complex_infrastructure',
            'infrastructure_id',
            'tags',
            'id'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%infrastructure}}');
    }
}
