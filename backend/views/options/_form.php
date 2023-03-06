<?php

use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Options $model */
/** @var yii\widgets\ActiveForm $form */
/** @var array $optionValues */


$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Address: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Address: " + (index + 1))
    });
});
';

$this->registerJs($js);


?>

<div class="options-form">

    <?php $form = ActiveForm::begin([
        'id' => 'dynamic-form'
    ]); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'title_tr')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'weight')->textInput() ?>
        </div>
        <div class="col-md-8">
            <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $optionValues[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'value_tr',
                    'value_ru',
                    'value_en',
                    'weight',
                    'icon',
                ],
            ]); ?>
            <div class="panel panel-default">
                <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Option Values</h4>
                </div>
                <div class="panel-body">
                    <div class="container-items"><!-- widgetContainer -->
                        <?php foreach ($optionValues as $i => $optionValue): ?>
                            <div class="item panel panel-default"><!-- widgetBody -->
                                <div class="panel-heading">
                                    <h3 class="panel-title pull-left">Value</h3>
                                    <div class="pull-right">
                                        <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                                        <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-body">
                                    <?php
                                    // necessary for update action.
                                    if (! $optionValue->isNewRecord) {
                                        echo Html::activeHiddenInput($optionValue, "[{$i}]id");
                                    }
                                    ?>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <?= $form->field($optionValue, "[{$i}]value_tr")->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <?= $form->field($optionValue, "[{$i}]value_ru")->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <?= $form->field($optionValue, "[{$i}]value_en")->textInput(['maxlength' => true]) ?>
                                        </div>
                                    </div><!-- .row -->
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <?= $form->field($optionValue, "[{$i}]weight")->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <?= $form->field($optionValue, "[{$i}]icon")->textInput(['maxlength' => true]) ?>
                                        </div>
                                    </div><!-- .row -->
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>





    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


