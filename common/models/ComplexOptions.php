<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "complex_options".
 *
 * @property int $id
 * @property int|null $option_id
 * @property int|null $complex_id
 * @property int|null $value_id
 *
 * @property Complexes $complex
 * @property Options $option
 * @property OptionValues $value
 */
class ComplexOptions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'complex_options';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['option_id', 'complex_id', 'value_id'], 'integer'],
            [['complex_id'], 'exist', 'skipOnError' => true, 'targetClass' => Complexes::class, 'targetAttribute' => ['complex_id' => 'id']],
            [['option_id'], 'exist', 'skipOnError' => true, 'targetClass' => Options::class, 'targetAttribute' => ['option_id' => 'id']],
            [['value_id'], 'exist', 'skipOnError' => true, 'targetClass' => OptionValues::class, 'targetAttribute' => ['value_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'option_id' => 'Option ID',
            'complex_id' => 'Complex ID',
            'value_id' => 'Value ID',
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
     * Gets query for [[Option]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOption()
    {
        return $this->hasOne(Options::class, ['id' => 'option_id']);
    }

    /**
     * Gets query for [[Value]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getValue()
    {
        return $this->hasOne(OptionValues::class, ['id' => 'value_id']);
    }
}
