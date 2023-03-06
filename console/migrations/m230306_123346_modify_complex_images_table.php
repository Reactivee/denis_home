<?php

use yii\db\Migration;

/**
 * Class m230306_123346_modify_complex_images_table
 */
class m230306_123346_modify_complex_images_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(\common\models\ComplexImages::tableName(),'name',$this->string());
        $this->addColumn(\common\models\ComplexImages::tableName(),'generate_name',$this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230306_123346_modify_complex_images_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230306_123346_modify_complex_images_table cannot be reverted.\n";

        return false;
    }
    */
}
