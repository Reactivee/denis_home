<?php

use yii\db\Migration;

/**
 * Class m230307_124349_modify_complex_table_add_attractions_column
 */
class m230307_124349_modify_complex_table_add_attractions_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(\common\models\Complexes::tableName(),'attractions_tr',$this->text());
        $this->addColumn(\common\models\Complexes::tableName(),'attractions_ru',$this->text());
        $this->addColumn(\common\models\Complexes::tableName(),'attractions_en',$this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230307_124349_modify_complex_table_add_attractions_column cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230307_124349_modify_complex_table_add_attractions_column cannot be reverted.\n";

        return false;
    }
    */
}
