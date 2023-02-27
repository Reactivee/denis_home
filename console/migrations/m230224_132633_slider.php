<?php

use yii\db\Migration;

/**
 * Class m230224_132633_slider
 */
class m230224_132633_slider extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('sliders', [
            'id' => $this->primaryKey(),
            'key' => $this->string(64)->notNull()->unique(),
            'name' => $this->string(64)->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->createTable('slider_items', [
            'id' => $this->primaryKey(),
            'slider_id' => $this->integer()->notNull(),
            'title_ru' => $this->string()->notNull(),
            'title_en' => $this->string()->notNull(),
            'title_tr' => $this->string()->notNull(),
            'description_ru' => $this->text()->null(),
            'description_en' => $this->text()->null(),
            'description_tr' => $this->text()->null(),
            'image' => $this->string()->notNull(),
            'link' => $this->string()->null(),
            'weight' => $this->integer()->notNull()->defaultValue(0),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-slider_items-slider_id',
            'slider_items',
            'slider_id',
            'sliders',
            'id',
            'CASCADE',
            'NO ACTION');

        $this->createIndex(
            'idx-slider_items-slider_id',
            'slider_items',
            'slider_id'
        );


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230224_132633_slider cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230224_132633_slider cannot be reverted.\n";

        return false;
    }
    */
}
