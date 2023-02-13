<?php

namespace backend\models\users;

use backend\models\cards\Cards;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $second_name
 * @property string|null $full_name
 * @property int|null $birthdate
 * @property float|null $balance
 * @property float|null $total_orders_price
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['birthdate'], 'integer'],
            [['first_name'], 'required'],
            [['balance', 'total_orders_price'], 'number'],
            [['first_name', 'second_name', 'full_name'], 'string', 'max' => 255],
        ];
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'second_name' => 'Second Name',
            'full_name' => 'Full Name',
            'birthdate' => 'Birthdate',
            'balance' => 'Balance',
            'total_orders_price' => 'Total Orders Price',
        ];
    }


}
