<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "complex_tags".
 *
 * @property int $id
 * @property int|null $complex_id
 * @property int|null $tag_id
 *
 * @property Complexes $complex
 * @property Tags $tag
 */
class ComplexTags extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'complex_tags';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['complex_id', 'tag_id'], 'integer'],
            [['complex_id'], 'exist', 'skipOnError' => true, 'targetClass' => Complexes::class, 'targetAttribute' => ['complex_id' => 'id']],
            [['tag_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tags::class, 'targetAttribute' => ['tag_id' => 'id']],
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
            'tag_id' => 'Tag ID',
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
     * Gets query for [[Tag]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(Tags::class, ['id' => 'tag_id']);
    }
}
