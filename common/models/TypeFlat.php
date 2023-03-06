<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "type_flat".
 *
 * @property int $id
 * @property string|null $img
 * @property string|null $link
 * @property string|null $icon
 * @property string|null $title_tr
 * @property string|null $title_ru
 * @property string|null $title_en
 * @property string|null $text_en
 * @property string|null $text_tr
 * @property string|null $text_ru
 */
class TypeFlat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'type_flat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text_en', 'text_tr', 'text_ru'], 'string'],
            [['img', 'link', 'icon', 'title_tr', 'title_ru', 'title_en'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => 'Img',
            'link' => 'Link',
            'icon' => 'Icon',
            'title_tr' => 'Title Tr',
            'title_ru' => 'Title Ru',
            'title_en' => 'Title En',
            'text_en' => 'Text En',
            'text_tr' => 'Text Tr',
            'text_ru' => 'Text Ru',
        ];
    }

    public static function getTypesList()
    {
        $array = self::find()->asArray()->all();
        return ArrayHelper::map($array,'id','title_tr');
    }
}
