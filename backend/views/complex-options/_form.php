<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\ComplexOptions $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="complex-options-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'option_id')->textInput() ?>

    <?= $form->field($model, 'complex_id')->textInput() ?>

    <?= $form->field($model, 'value_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
