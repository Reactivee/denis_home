<?php

namespace frontend\widgets;


use common\models\ProductImages;
use yii\base\Widget;

class ProductWidget extends Widget
{
    public $products = [];

    public function init()
    {
        parent::init();
    }

    public function run()
    {

        return $this->render('product', [
            'products' => $this->products,

        ]);
    }

}