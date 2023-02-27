<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Team $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="team-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4">

            <?= $form->field($model, 'name_tr')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-md-4">

            <?= $form->field($model, 'prof_ru')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'prof_tr')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'prof_en')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'google')->textInput(['maxlength' => true]) ?>

        </div>

        <div class="col-md-4">


            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>


            <?= $form->field($model, 'facebook')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'instagram')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'telegram')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-4">

            <?= $form->field($model, 'img')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
            ]); ?>
        </div>
    </div>





    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
