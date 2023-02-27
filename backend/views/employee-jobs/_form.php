<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\employee\EmployeeJobs $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="employee-jobs-form">

    <div class="row">
        <div class="col-md-4">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'job_name_ru')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'job_name_en')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'job_name_tr')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
