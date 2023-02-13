<?php

use yii\db\Migration;

/**
 * Class m220703_175827_tables_new
 */
class m220703_175827_tables_new extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
//        $this->createTable('product_categories', [
//            'id' => $this->primaryKey(),
//            'product_id' => $this->integer(),
//            'category_id' => $this->integer()
//        ]);

        $this->addColumn('sorts', 'type', $this->string());
        $this->addColumn('sorts', 'status', $this->string());
        $this->addColumn('product', 'status', $this->string());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220703_175827_tables_new cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220703_175827_tables_new cannot be reverted.\n";

        return false;
    }
    */
}
