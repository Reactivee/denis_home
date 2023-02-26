<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "advantages".
 *
 * @property int $id
 * @property string|null $title_tr
 * @property string|null $title_ru
 * @property string|null $title_en
 * @property string|null $text_en
 * @property string|null $text_tr
 * @property string|null $text_ru
 * @property string|null $img
 */
class Advantages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'advantages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text_en', 'text_tr', 'text_ru'], 'string'],
            [['title_tr', 'title_ru', 'title_en', 'img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_tr' => 'Title Tr',
            'title_ru' => 'Title Ru',
            'title_en' => 'Title En',
            'text_en' => 'Text En',
            'text_tr' => 'Text Tr',
            'text_ru' => 'Text Ru',
            'img' => 'Img',
        ];
    }
}
