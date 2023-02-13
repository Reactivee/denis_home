<?php

namespace frontend\widgets;


use common\models\ProductImages;
use yii\base\Widget;

class RequestWidget extends Widget
{
    public $address;

    public function init()
    {
        parent::init();
    }

    public function run()
    {

        return $this->render('request', [
            'address' => $this->address

        ]);
    }

}