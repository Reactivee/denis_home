<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "complex_images".
 *
 * @property int $id
 * @property int|null $complex_id
 * @property string|null $path
 * @property int|null $weight
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Complexes $complex
 */
class ComplexImages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'complex_images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['complex_id', 'weight', 'created_at', 'updated_at'], 'integer'],
            [['path'], 'string', 'max' => 255],
            [['complex_id'], 'exist', 'skipOnError' => true, 'targetClass' => Complexes::class, 'targetAttribute' => ['complex_id' => 'id']],
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
            'path' => 'Path',
            'weight' => 'Weight',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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
}
