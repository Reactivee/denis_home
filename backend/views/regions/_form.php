<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Regions $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="regions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'city_id')->textInput() ?>

    <?= $form->field($model, 'name_tr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
