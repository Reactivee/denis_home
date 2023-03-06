<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\OptionValuesSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="option-values-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'option_id') ?>

    <?= $form->field($model, 'value_tr') ?>

    <?= $form->field($model, 'value_ru') ?>

    <?= $form->field($model, 'value_en') ?>

    <?php // echo $form->field($model, 'icon') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
