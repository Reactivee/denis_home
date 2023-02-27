<?php

namespace backend\models\employee;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "employee_jobs".
 *
 * @property int $id
 * @property string|null $job_name_ru
 * @property string|null $job_name_en
 * @property string|null $job_name_tr
 *
 * @property Employees[] $employees
 */
class EmployeeJobs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee_jobs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['job_name_ru', 'job_name_en', 'job_name_tr'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'job_name_ru' => 'Job Name Ru',
            'job_name_en' => 'Job Name En',
            'job_name_tr' => 'Job Name Tr',
        ];
    }

    /**
     * Gets query for [[Employees]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employees::class, ['job_id' => 'id']);
    }

    public static function getJobsList()
    {
        $jobs = self::find()->asArray()->all();
        //var_dump($jobs);die();
        return ArrayHelper::map($jobs,'id','job_name_en');
    }
}
