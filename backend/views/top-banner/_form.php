<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TopBanner */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="top-banner-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'title_tr')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'text_tr')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'text_ru')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-md-4">

            <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>



            <?= $form->field($model, 'text_en')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">


            <?= $form->field($model, 'img_path')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
            ]); ?>
        </div>
        <div class="col-md-4">

            <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

        </div>
    </div>




    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
