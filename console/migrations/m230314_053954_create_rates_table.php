<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rates}}`.
 */
class m230314_053954_create_rates_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%rates}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%rates}}');
    }
}
