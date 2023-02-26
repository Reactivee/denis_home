<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "top_banner".
 *
 * @property int $id
 * @property string|null $title_uz
 * @property string|null $title_ru
 * @property string|null $title_en
 * @property string|null $text_uz
 * @property string|null $text_ru
 * @property string|null $text_en
 * @property int|null $status
 * @property string|null $link
 * @property string|null $img_path
 */
class TopBanner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'top_banner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['title_uz', 'title_ru', 'title_en', 'text_uz', 'text_ru', 'text_en', 'link',], 'string', 'max' => 255],
            ['img_path', 'file']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_uz' => 'Title Uz',
            'title_ru' => 'Title Ru',
            'title_en' => 'Title En',
            'text_uz' => 'Text Uz',
            'text_ru' => 'Text Ru',
            'text_en' => 'Text En',
            'status' => 'Status',
            'link' => 'Link',
            'img_path' => 'Img Path',
        ];
    }
}
