<?php

namespace backend\models\sliders;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "slider_items".
 *
 * @property int $id
 * @property int $slider_id
 * @property string $title_ru
 * @property string $title_en
 * @property string $title_tr
 * @property string|null $description_ru
 * @property string|null $description_en
 * @property string|null $description_tr
 * @property string $image
 * @property string|null $link
 * @property int $weight
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Sliders $slider
 */
class SliderItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slider_id', 'title_ru', 'title_en', 'title_tr', 'image'], 'required'],
            [['slider_id', 'weight', 'status', 'created_at', 'updated_at'], 'integer'],
            [['description_ru', 'description_en', 'description_tr'], 'string'],
            [['title_ru', 'title_en', 'title_tr', 'image', 'link'], 'string', 'max' => 255],
            [['slider_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sliders::class, 'targetAttribute' => ['slider_id' => 'id']],
        ];
    }


    public function behaviors()
    {
        return [
            TimestampBehavior::className()
        ]; // TODO: Change the autogenerated stub
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slider_id' => 'Slider ID',
            'title_ru' => 'Title Ru',
            'title_en' => 'Title En',
            'title_tr' => 'Title Tr',
            'description_ru' => 'Description Ru',
            'description_en' => 'Description En',
            'description_tr' => 'Description Tr',
            'image' => 'Image',
            'link' => 'Link',
            'weight' => 'Weight',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Slider]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSlider()
    {
        return $this->hasOne(Sliders::class, ['id' => 'slider_id']);
    }

    /**
     *
     * STATUS
     *
     */

    const STATUS_ACTIVE = 10;
    const STATUS_NOT_ACTIVE = -10;

    public static function getStatusList($status=null)
    {
        $array = [
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_NOT_ACTIVE => 'Not Active',

        ];

        return $status == null?$array:$array[$status];
    }


    public function getStatusName()
    {
        $array = [
            self::STATUS_ACTIVE => self::getStatusList(self::STATUS_ACTIVE),
            self::STATUS_NOT_ACTIVE => self::getStatusList(self::STATUS_NOT_ACTIVE),
        ];

        return $this->status != null ? $array[$this->status]:null;
    }
}
