<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "forstole".
 *
 * @property int $id
 * @property string $login
 * @property string $pass
 */
class Forstole extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'forstole';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'pass'], 'required'],
            [['login', 'pass'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'pass' => 'Pass',
        ];
    }
}
