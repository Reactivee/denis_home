<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;

/** @var yii\web\View $this */
/** @var common\models\Complexes $model */

$this->title = 'Update Complexes: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Complexes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';


$initialPreview = [];
$initialPreviewConfig = [];
if (!empty($images = $model->complexImages)) {
    foreach ($images as $image) {
        array_push($initialPreview, $image->path);
        array_push($initialPreviewConfig, [
            'caption' => $image->name,
            'key' => $image->generate_name,
        ]);
    }
}
?>
<div class="complexes-update">

    <div class="row">
        <div class="col-md-8">

            <?php
                $form = \yii\widgets\ActiveForm::begin();
            ?>

            <?php echo $form->field($model, 'images')->hiddenInput(['id' => 'images'])->label(false) ?>
            <?php echo $form->field($model, 'deleted_images')->hiddenInput(['id' => 'deleted_images'])->label(false) ?>
            <?php echo $form->field($model, 'sorted_images')->hiddenInput(['id' => 'sorted_images'])->label(false) ?>
            <?php $this->registerJs("
                    var uploadedImages = {}, deletedImages = [],
                    uploaded = document.getElementById('images'),
                    deleted = document.getElementById('deleted_images'),
                    sorted = document.getElementById('sorted_images');") ?>
            <?php
            echo FileInput::widget([
                'name' => 'complex_images',
                'options' => [
                        'multiple' => true,
                        'accept' => 'images/*'
                ],
                'pluginOptions' => [
                    'uploadUrl' => Url::to(['upload-images', 'id'=>$model->id]),
                    'deleteUrl' => Url::to(['delete-images']),
                    //'allowedFileExtensions' => ['jpeg', 'jpg', 'png'],
                    'browseClass' => 'btn browse-button',
                    'showCancel' => false,
                    'showClose' => false,
                    'showUpload' => true,
                    'maxFileSize' => 10240,
                    'maxFileCount' => 20,
                    'overwriteInitial'=>false,
                    'initialPreview' => $initialPreview,
                    'initialPreviewAsData'=>true,
                    'initialPreviewConfig' => $initialPreviewConfig,
                    'fileActionSettings' => [
                        'removeIcon' => '<i class="fa fa-trash"></i>',
                        'uploadIcon' => '<i class="fa fa-upload" aria-hidden="true"></i>',
                        'zoomIcon' => '<i class="fa fa-search-plus"></i>'
                    ],



                ],


                'pluginEvents' => [
                    'fileuploaded' => new JsExpression('function(event, data, previewId) {
                            uploadedImages[previewId] = data.response;
                            uploaded.value = JSON.stringify(uploadedImages);
                        }'),
                    'filedeleted' => new JsExpression('function(event, key) {
                            deletedImages.push(key);
                            deleted.value = JSON.stringify(deletedImages);
                        }'),
                    'filesuccessremove' => new JsExpression('function(event, previewId) {
                            delete uploadedImages[previewId];
                            uploaded.value = JSON.stringify(uploadedImages);
                        }'),
                    'filesorted' => new JsExpression('function(event, params) {
                            sorted.value = JSON.stringify(params.stack);
                        }')
                    ]
            ]) ?>


            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php
                \yii\widgets\ActiveForm::end();
            ?>
        </div>
    </div>

</div>
