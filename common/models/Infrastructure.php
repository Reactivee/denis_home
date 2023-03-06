<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "infrastructure".
 *
 * @property int $id
 * @property string|null $title_tr
 * @property string|null $title_en
 * @property string|null $title_ru
 * @property string|null $icon
 */
class Infrastructure extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'infrastructure';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_tr', 'title_en', 'title_ru', 'icon'], 'string', 'max' => 255],
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
            'title_en' => 'Title En',
            'title_ru' => 'Title Ru',
            'icon' => 'Icon',
        ];
    }

    public static function getInfrastructureList()
    {
        $array = self::find()->select('id, title_tr as title')->asArray()->all();
        return ArrayHelper::map($array,'id','title');
    }
}
