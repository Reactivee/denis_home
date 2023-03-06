<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\OptionValues $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="option-values-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'option_id')->textInput() ?>

    <?= $form->field($model, 'value_tr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'value_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'value_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'weight')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
    'widgetBody' => '.container-items', // required: css class selector
    'widgetItem' => '.item', // required: css class
    'limit' => 4, // the maximum times, an element can be cloned (default 999)
    'min' => 0, // 0 or 1 (default 1)
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
        <div class="panel-heading">
            <i class="fa fa-envelope"></i> Value
            <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Add Value</button>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body container-items"><!-- widgetContainer -->
            <?php foreach ($optionValues as $index => $optionValue): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <span class="panel-title-address">Address: <?= ($index + 1) ?></span>
                        <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                        // necessary for update action.
                        if (!$optionValue->isNewRecord) {
                            echo Html::activeHiddenInput($optionValue, "[{$index}]id");
                        }
                        ?>
                        <?= $form->field($optionValue, "[{$index}]value_tr")->textInput(['maxlength' => true]) ?>

                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($optionValue, "[{$index}]value_ru")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($optionValue, "[{$index}]value_en")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- end:row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($optionValue, "[{$index}]weight")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($optionValue, "[{$index}]icon")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- end:row -->

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php DynamicFormWidget::end(); ?>