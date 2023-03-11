<?php

use yii\db\Migration;

/**
 * Class m230310_095416_modify_complexes_table_add_lattitude
 */
class m230310_095416_modify_complexes_table_add_lattitude extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(\common\models\Complexes::tableName(),'latitude',$this->string());
        $this->addColumn(\common\models\Complexes::tableName(),'longitude',$this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230310_095416_modify_complexes_table_add_lattitude cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230310_095416_modify_complexes_table_add_lattitude cannot be reverted.\n";

        return false;
    }
    */
}
