<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "apartments".
 *
 * @property int $id
 * @property int|null $complex_id
 * @property float|null $price
 * @property int|null $count_rooms
 * @property float|null $area
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property ApartmentImages[] $apartmentImages
 * @property Complexes $complex
 */
class Apartments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'apartments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['complex_id', 'count_rooms', 'created_at', 'updated_at'], 'integer'],
            [['price', 'area'], 'number'],
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
            'price' => 'Price',
            'count_rooms' => 'Count Rooms',
            'area' => 'Area',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[ApartmentImages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApartmentImages()
    {
        return $this->hasMany(ApartmentImages::class, ['apartment_id' => 'id']);
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
