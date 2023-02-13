<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\translatemanager\models\Language;

/* @var $this yii\web\View */
/* @var $model backend\modules\translatemanager\models\Language */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box-body">
    <div class="language-form col-sm-8 col-md-6 col-lg-4">

        <?php $form = ActiveForm::begin([
            'enableAjaxValidation' => true,
        ]); ?>

        <?php echo $form->field($model, 'language_id')->textInput(['maxlength' => 5]) ?>

        <?php echo $form->field($model, 'language')->textInput(['maxlength' => 3]) ?>

        <?php echo $form->field($model, 'country')->textInput(['maxlength' => 3]) ?>

        <?php echo $form->field($model, 'name')->textInput(['maxlength' => 32]) ?>

        <?php echo $form->field($model, 'name_ascii')->textInput(['maxlength' => 32]) ?>

        <?php echo $form->field($model, 'status')->dropDownList(Language::getStatusNames()) ?>

        <div class="form-group">
            <?php echo Html::submitButton($model->isNewRecord ? Yii::t('language', 'Create') : Yii::t('language', 'Update'),
                ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>