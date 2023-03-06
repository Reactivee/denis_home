<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%complexes}}`.
 */
class m230303_101544_create_complexes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%complexes}}', [
            'id' => $this->primaryKey(),
            'address' => $this->text(),
            'city_id' => $this->integer(),
            'region_id' => $this->integer(),
            'description_tr' => $this->text(),
            'description_ru' => $this->text(),
            'description_en' => $this->text(),
            'count_buildings' => $this->text(),
            'count_storeys' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);


        $this->createTable('apartments',[
            'id' => $this->primaryKey(),
            'complex_id' => $this->integer(),
            'price' => $this->double(),
            'count_rooms' => $this->integer(),
            'area' => $this->float(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-apartments-complex_id',
            'apartments',
            'complex_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-apartments-complex_id',
            'apartments',
            'complex_id',
            'complexes',
            'id',
            'CASCADE'
        );


        $this->createTable('complex_images',[
            'id' => $this->primaryKey(),
            'complex_id' => $this->integer(),
            'path' => $this->string(),
            'weight' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-complex_images-complex_id',
            'complex_images',
            'complex_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-complex_images-complex_id',
            'complex_images',
            'complex_id',
            'complexes',
            'id',
            'CASCADE'
        );



        $this->createTable('apartment_images',[
            'id' => $this->primaryKey(),
            'apartment_id' => $this->integer(),
            'complex_id' => $this->integer(),
            'path' => $this->string(),
            'weight' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-apartment_images-apartment_id',
            'apartment_images',
            'apartment_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-apartment_images-apartment_id',
            'apartment_images',
            'apartment_id',
            'apartments',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%complexes}}');
    }
}
