<?php

namespace common\models;

use backend\behaviors\SlugBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

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
 * @property int|null $count_buildings
 * @property int|null $count_storeys
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $type_id
 * @property string|null $title_tr
 * @property string|null $title_ru
 * @property string|null $title_en
 * @property string|null $attractions_tr
 * @property string|null $attractions_ru
 * @property string|null $attractions_en
 * @property string|null $slug
 * @property string|null $latitude
 * @property string|null $longitude
 *
 * @property Apartments[] $apartments
 * @property ComplexImages[] $complexImages
 * @property ComplexOptions[] $complexOptions
 * @property Tags[] $tags
 * @property Infrastructure[] $infrastructures
 * @property TypeFlat $type
 * @property Cities $city
 * @property Regions $region
 */
class Complexes extends \yii\db\ActiveRecord
{

    public $tag_ids;
    public $images;
    public $deleted_images;
    public $sorted_images;
    public $options;
    public $infrastructure_ids;

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
            [['address', 'description_tr', 'description_ru', 'description_en', 'title_tr','title_ru','title_en','attractions_tr','attractions_ru','attractions_en','slug','longitude','latitude'], 'string'],
            [['city_id', 'region_id', 'created_at', 'updated_at', 'created_by', 'updated_by','count_buildings', 'count_storeys',], 'integer'],
            [['tag_ids','images','options','infrastructure_ids','sorted_images','deleted_images'], 'safe'],
            [['address','city_id','region_id','address', 'description_tr', 'description_ru', 'description_en', 'title_tr','title_ru','title_en','type_id','count_buildings','count_storeys'], 'required'],
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
           [
                'class' => SlugBehavior::className(),
                'attribute' => 'title_en',
            ],
        ]; // TODO: Change the autogenerated stub
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
            'title_tr' => 'Title tr',
            'title_ru' => 'Title ru',
            'title_en' => 'Title en',
            'attractions_tr' => 'attractions tr',
            'attractions_ru' => 'attractions ru',
            'attractions_en' => 'attractions en',
            'slug' => 'Slug',
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

    public function getApartmentsGroup()
    {
        $grouped = Apartments::find()->where(['complex_id' => $this->id])->orderBy(['price' => SORT_ASC])->all();
//    dd($grouped);
        $grouped = ArrayHelper::index($grouped, null, 'count_rooms');
// /       dd($grouped);
        return $grouped;
//        return $this->hasMany(Apartments::class, ['complex_id' => 'id'])->orderBy(['price' => SORT_ASC]);
    }

    /**
     * Gets query for [[ComplexImages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComplexImages()
    {
        return $this->hasMany(ComplexImages::class, ['complex_id' => 'id'])->orderBy(['weight'=>SORT_ASC]);
    }
    /**
     * Gets query for [[ComplexOptions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComplexOptions()
    {
        return $this->hasMany(ComplexOptions::class, ['complex_id' => 'id'])->with(['option','value']);
    }
    /**
     * Gets query for [[ComplexOptions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tags::class, ['id' => 'tag_id'])->viaTable('complex_tags',['complex_id'=>'id']);
    }
    /**
     * Gets query for [[ComplexInfrastructure]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInfrastructures()
    {
        return $this->hasMany(Infrastructure::class, ['id' => 'infrastructure_id'])->viaTable('complex_infrastructure',['complex_id'=>'id']);
    }

    public function getType()
    {
        return $this->hasOne(TypeFlat::class,['id' => 'type_id']);
    }
    public function getCity()
    {
        return $this->hasOne(Cities::class,['id' => 'city_id']);
    }
    public function getRegion()
    {
        return $this->hasOne(Regions::class,['id' => 'region_id']);
    }


    public function afterSave($insert, $changedAttributes)
    {

        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }

}
