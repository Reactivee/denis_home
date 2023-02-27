<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\sliders\SliderItems $model */
/** @var yii\widgets\ActiveForm $form */

if ($model->image !== null)
{
    $initialViewArray = [
        Html::img($model->image,['class'=>'file-preview-image'])
    ];
    $initialPreviewConfig = [
        ['caption' => $model->title_en, 'size' => filesize(Yii::getAlias('@rootDir').$model->image)],

    ];
}
else {
    $initialViewArray = [];
    $initialPreviewConfig = [];
}
?>

<div class="slider-items-form">

    <p>
        <?= Html::a('Back', ['view','id' => $model->slider_id], ['class' => 'btn btn-success']) ?>
    </p>
    <?php $form = ActiveForm::begin(); ?>


    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'description_en')->textarea(['rows' => 6]) ?>

        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'description_ru')->textarea(['rows' => 6]) ?>

        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'title_tr')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'description_tr')->textarea(['rows' => 6]) ?>

        </div>

        <div class="col-md-4">

            <?php echo $form->field($model, 'image')->hiddenInput(['id' => 'slider_image','value' => $model->image!=null?$model->image:''])->label() ?>
            <?php $this->registerJs("
                                            var uploadedFilesMain = {}, deletedFilesMain = [],
                                            uploaded_main = document.getElementById('slider_image'),
                                            deleted_main = document.getElementById('deleted_images');") ?>
            <?php
            echo FileInput::widget([
                'name' => 'img',
                'options' => [

                ],
                'pluginOptions' => [
                    'uploadUrl' => Url::to(['image-upload']),
                    'deleteUrl' => Url::to(['delete-image']),
                    'allowedFileExtensions' => ['jpeg', 'jpg', 'png'],
                    'browseClass' => 'btn browse-button',
                    'showCancel' => false,
                    'showClose' => false,
                    'maxFileSize' => 10240,
                    'maxFileCount' => 1,
                    'initialPreview' => $initialViewArray,
                    'initialPreviewConfig' => $initialPreviewConfig,
                    'fileActionSettings' => [
                        'removeIcon' => '<i class="fa fa-trash"></i>',
                        'uploadIcon' => '<i class="fa fa-upload"></i>',
                    ]


                ],
                'pluginEvents' => [
                    'fileuploaded' => new JsExpression('function(event, data, previewId) {
                                                    //console.log(data.response);
                                                    uploadedFilesMain[data.response.name] = data.response.path;
                        
                                                    uploaded_main.value = data.response.path;
                                                    console.log(uploaded_main.value);
                                                    //document.getElementById("main").value =JSON.stringify(uploadedFilesMain); 
                                                }'),
                    'filedeleted' => new JsExpression('function(event, key) {
                                                    deletedFilesMain.push(key);
                                                    deleted_main.value = JSON.stringify(deletedFilesMain);
                                                }'),
                    'filesuccessremove' => new JsExpression('function(event, previewId) {
                                                    delete uploadedFilesMain[previewId];
                                                    uploaded_main.value = JSON.stringify(uploadedFilesMain);
                                                }'),

                ]
            ]) ?>

        </div>
        <div class="col-md-4">

            <?= $form->field($model, 'weight')->textInput() ?>

            <?= $form->field($model, 'status')->dropDownList(\backend\models\sliders\SliderItems::getStatusList()) ?>

        </div>
    </div>






    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
