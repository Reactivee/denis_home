<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\TypeFlat $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="type-flat-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'title_tr')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'text_tr')->textarea(['rows' => 6]) ?>

        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'text_ru')->textarea(['rows' => 6]) ?>

        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'text_en')->textarea(['rows' => 6]) ?>

        </div>

        <div class="col-md-4">

            <?= $form->field($model, 'img')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
            ]); ?>
        </div>
        <div class="col-md-4">

            <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>
        </div>
    </div>








    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
