<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tags".
 *
 * @property int $id
 * @property string|null $title_tr
 * @property string|null $title_ru
 * @property string|null $title_en
 * @property string|null $icon
 */
class Tags extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tags';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_tr', 'title_ru', 'title_en', 'icon'], 'string', 'max' => 255],
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
            'icon' => 'Icon',
        ];
    }
}
