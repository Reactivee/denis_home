<?php

use yii\db\Migration;

/**
 * Class m230307_134953_modify_complexes_table_add_slug
 */
class m230307_134953_modify_complexes_table_add_slug extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(\common\models\Complexes::tableName(),'slug',$this->string());

        $this->createIndex(
            'idx-complexes-slug',
            'complexes',
            'slug'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230307_134953_modify_complexes_table_add_slug cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230307_134953_modify_complexes_table_add_slug cannot be reverted.\n";

        return false;
    }
    */
}
