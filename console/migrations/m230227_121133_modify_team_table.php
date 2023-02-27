<?php

use yii\db\Migration;

/**
 * Class m230227_121133_modify_team_table
 */
class m230227_121133_modify_team_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(\common\models\Team::tableName(),'img',$this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230227_121133_modify_team_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230227_121133_modify_team_table cannot be reverted.\n";

        return false;
    }
    */
}
