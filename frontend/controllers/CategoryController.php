<?php

namespace frontend\controllers;


use common\models\Complexes;
use common\models\LoginForm;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use yii\web\Response;

/**
 * Site controller
 */
class CategoryController extends Controller
{
//    /**
//     * {@inheritdoc}
//     */
//    public function behaviors()
//    {
//
//    }


    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $estate = Complexes::find()->one();

        return $this->render('index', [
            'estate' => $estate,
        ]);
    }


}
