<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "complexes".
 *
 * @property int $id
 * @property string|null $address
 * @property int|null $city_id
 * @property int|null $region_id
 * @property string|null $description_tr
 * @property string|null $description_ru
 * @property string|null $description_en
 * @property string|null $count_buildings
 * @property string|null $count_storeys
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property Apartments[] $apartments
 * @property ComplexImages[] $complexImages
 */
class Complexes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'complexes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address', 'description_tr', 'description_ru', 'description_en', 'count_buildings', 'count_storeys'], 'string'],
            [['city_id', 'region_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Address',
            'city_id' => 'City ID',
            'region_id' => 'Region ID',
            'description_tr' => 'Description Tr',
            'description_ru' => 'Description Ru',
            'description_en' => 'Description En',
            'count_buildings' => 'Count Buildings',
            'count_storeys' => 'Count Storeys',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[Apartments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApartments()
    {
        return $this->hasMany(Apartments::class, ['complex_id' => 'id']);
    }

    /**
     * Gets query for [[ComplexImages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComplexImages()
    {
        return $this->hasMany(ComplexImages::class, ['complex_id' => 'id']);
    }
}
