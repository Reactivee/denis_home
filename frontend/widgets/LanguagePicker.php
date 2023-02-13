<?php
/**
 * Created by PhpStorm.
 * User: a_obidov
 * Date: 28.03.2021
 * Time: 14:35
 */

namespace frontend\widgets;

use yii\base\Widget;
use yii\bootstrap\Html;
use Yii;

class LanguagePicker extends Widget
{
    public function run()
    {
        $lang = [
            'uz' => 'Oʻz',
            'ru' => 'Рус',
            'en' => 'Eng'
        ];
        $currentLang = $lang[Yii::$app->language];
//        dd($currentLang);
        unset($lang[Yii::$app->language]);
        $params = Yii::$app->request->queryParams;
        $items = [];

        foreach ($lang as $code => $language) {
            $params[0] = '';
            $params['language'] = $code;
            $items[] = Html::a($language, $params);
        }

        return Html::ul(
            [
                Html::a($currentLang, 'Rus', ['class' => 'ibtn_outline_yellow px-4 py-3 text-decoration-none  dropdown-toggle color_black', 'id' => "dropdownMenuButton", 'data-toggle' => 'dropdown', 'aria-expanded' => "false", 'role' => 'button']) .
                Html::ul($items,
                    [
                        'class' => 'dropdown-menu list-unstyled border-0',
                        'aria-labelledby' => "dropdownMenuButton",
                        'encode' => false
                    ])
            ],
            [
                'class' => 'my-lang-picker list-unstyled text-uppercase m-0',
                'encode' => false,
                'itemOptions' => [

                ]
            ]
        );
    }
}

?>
<!--<a class=" ibtn_outline_yellow px-4 py-3 text-decoration-none  dropdown-toggle color_black"-->
<!--   type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">-->
<!--    Русский-->
<!--</a>-->
<!--<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">-->
<!--    <a class="dropdown-item" href="#">Узбек</a>-->
<!--    <a class="dropdown-item" href="#">Русский</a>-->
<!--    <a class="dropdown-item" href="#">Английский</a>-->
<!--</div>-->
