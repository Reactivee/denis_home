<?php

use yii\db\Migration;

/**
 * Class m230224_133445_employees
 */
class m230224_133445_employees extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('employee_jobs',[
            'id' => $this->primaryKey(),
            'job_name_ru' => $this->string(),
            'job_name_en' => $this->string(),
            'job_name_tr' => $this->string(),
        ]);



        $this->createTable('employees',[
            'id' => $this->primaryKey(),
            'job_id' => $this->integer(),
            'full_name' => $this->string(),
            'phone_number' => $this->string(),
            'telegram' => $this->string(),
            'facebook' => $this->string(),
            'twitter' => $this->string(),
            'instagram' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'image' => $this->string(),
        ]);

        $this->addForeignKey(
            'fk-employees-job_id',
            'employees',
            'job_id',
            'employee_jobs',
            'id',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230224_133445_employees cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230224_133445_employees cannot be reverted.\n";

        return false;
    }
    */
}
