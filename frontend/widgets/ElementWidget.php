<?php

namespace frontend\widgets;


use common\models\ProductImages;
use yii\base\Widget;

class ElementWidget extends Widget
{
    public $products = [];

    public function init()
    {
        parent::init();
    }

    public function run()
    {

        return $this->render('element', [
            'products' => $this->products,

        ]);
    }

}