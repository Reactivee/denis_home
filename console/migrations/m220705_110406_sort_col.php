<?php

use yii\db\Migration;

/**
 * Class m220705_110406_sort_col
 */
class m220705_110406_sort_col extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220705_110406_sort_col cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220705_110406_sort_col cannot be reverted.\n";

        return false;
    }
    */
}
