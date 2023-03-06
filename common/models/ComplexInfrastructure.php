<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "complex_infrastructure".
 *
 * @property int $id
 * @property int|null $complex_id
 * @property int|null $infrastructure_id
 *
 * @property Complexes $complex
 * @property Tags $infrastructure
 */
class ComplexInfrastructure extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'complex_infrastructure';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['complex_id', 'infrastructure_id'], 'integer'],
            [['complex_id'], 'exist', 'skipOnError' => true, 'targetClass' => Complexes::class, 'targetAttribute' => ['complex_id' => 'id']],
            [['infrastructure_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tags::class, 'targetAttribute' => ['infrastructure_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'complex_id' => 'Complex ID',
            'infrastructure_id' => 'Infrastructure ID',
        ];
    }

    /**
     * Gets query for [[Complex]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComplex()
    {
        return $this->hasOne(Complexes::class, ['id' => 'complex_id']);
    }

    /**
     * Gets query for [[Infrastructure]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInfrastructure()
    {
        return $this->hasOne(Tags::class, ['id' => 'infrastructure_id']);
    }
}
