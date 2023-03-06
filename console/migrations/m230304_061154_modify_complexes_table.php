<?php

use yii\db\Migration;

/**
 * Class m230304_061154_modify_complexes_table
 */
class m230304_061154_modify_complexes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn(\common\models\Complexes::tableName(),'count_buildings',$this->integer());
        $this->alterColumn(\common\models\Complexes::tableName(),'count_storeys',$this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230304_061154_modify_complexes_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230304_061154_modify_complexes_table cannot be reverted.\n";

        return false;
    }
    */
}
