<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%regions}}`.
 */
class m230302_101450_create_regions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%regions}}', [
            'id' => $this->primaryKey(),
            'city_id' => $this->integer(),
            'name_tr' => $this->string(),
            'name_ru' => $this->string(),
            'name_en' => $this->string(),
        ]);

        $this->createIndex(
            'idx-regions-city_id',
            'regions',
            'city_id'
        );


        $this->addForeignKey(
            'fk-regions-city_id',
            'regions',
            'city_id',
            'cities',
            'id'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%regions}}');
    }
}
