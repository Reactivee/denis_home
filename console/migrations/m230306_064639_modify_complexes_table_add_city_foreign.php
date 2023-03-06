<?php

use yii\db\Migration;

/**
 * Class m230306_064639_modify_complexes_table_add_city_foreign
 */
class m230306_064639_modify_complexes_table_add_city_foreign extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createIndex(
            'idx-complexes-city_id',
            'complexes',
            'city_id'
        );

        $this->addForeignKey(
            'fk-complexes-city_id',
            'complexes',
            'city_id',
            'cities',
            'id'
        );


        $this->createIndex(
            'idx-complexes-region_id',
            'complexes',
            'region_id'
        );

        $this->addForeignKey(
            'fk-complexes-region_id',
            'complexes',
            'region_id',
            'regions',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230306_064639_modify_complexes_table_add_city_foreign cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230306_064639_modify_complexes_table_add_city_foreign cannot be reverted.\n";

        return false;
    }
    */
}
