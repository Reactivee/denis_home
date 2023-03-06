<?php

use yii\db\Migration;

/**
 * Class m230304_055923_modify_complexes_table_add_title
 */
class m230304_055923_modify_complexes_table_add_title extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(\common\models\Complexes::tableName(),'title_tr',$this->string());
        $this->addColumn(\common\models\Complexes::tableName(),'title_ru',$this->string());
        $this->addColumn(\common\models\Complexes::tableName(),'title_en',$this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230304_055923_modify_complexes_table_add_title cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230304_055923_modify_complexes_table_add_title cannot be reverted.\n";

        return false;
    }
    */
}
