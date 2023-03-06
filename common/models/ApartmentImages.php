<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "apartment_images".
 *
 * @property int $id
 * @property int|null $apartment_id
 * @property int|null $complex_id
 * @property string|null $path
 * @property int|null $weight
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Apartments $apartment
 */
class ApartmentImages extends \yii\db\ActiveRecord
{


    public $images;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'apartment_images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['apartment_id', 'complex_id', 'weight', 'created_at', 'updated_at'], 'integer'],
            [['path'], 'string', 'max' => 255],
            [['apartment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Apartments::class, 'targetAttribute' => ['apartment_id' => 'id']],
            [['images'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'apartment_id' => 'Apartment ID',
            'complex_id' => 'Complex ID',
            'path' => 'Path',
            'weight' => 'Weight',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Apartment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApartment()
    {
        return $this->hasOne(Apartments::class, ['id' => 'apartment_id']);
    }
}
