<?php

use yii\db\Migration;

/**
 * Class m230303_120329_modify_complex_table_add_type
 */
class m230303_120329_modify_complex_table_add_type extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(\common\models\Complexes::tableName(),'type_id',$this->integer());

        $this->createIndex(
            'idx-complexes-type_id',
            'complexes',
            'type_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-complexes-type_id',
            'complexes',
            'type_id',
            'type_flat',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230303_120329_modify_complex_table_add_type cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230303_120329_modify_complex_table_add_type cannot be reverted.\n";

        return false;
    }
    */
}
