<?php

use kartik\depdrop\DepDrop;
use kartik\file\FileInput;
use kartik\select2\Select2;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Complexes $model */
/** @var yii\widgets\ActiveForm $form */
/** @var array $options */
/** @var array $apartments */
?>

<div class="complexes-form panel">

   <div class="panel-body">
       <?php $form = ActiveForm::begin([
               'id' => 'dynamic-form'
       ]); ?>

       <div class="row">
           <div class="col-md-4">
               <?= $form->field($model, 'title_tr')->textInput() ?>
               <?= $form->field($model, 'description_tr')->textarea(['rows' => 6]) ?>

           </div>
           <div class="col-md-4">
               <?= $form->field($model, 'title_ru')->textInput() ?>
               <?= $form->field($model, 'description_ru')->textarea(['rows' => 6]) ?>

           </div>
           <div class="col-md-4">
               <?= $form->field($model, 'title_en')->textInput() ?>
               <?= $form->field($model, 'description_en')->textarea(['rows' => 6]) ?>

           </div>
           <div class="col-md-4">


               <?php
               echo $form->field($model, 'city_id')->widget(Select2::className(), [
                   'data' => \common\models\Cities::getCitiesList(),
                   'theme' => Select2::THEME_BOOTSTRAP,
                   'options' => ['placeholder' => 'City', 'id' => 'city-id'],
                   'pluginOptions' => ['allowClear' => true],
               ]);
               //echo $my_form->field($outcome, 'cat_id')->dropDownList(\backend\models\cash\OutcomeType::getAllParents(), ['id'=>'cat-id']);
               echo $form->field($model, 'region_id')->widget(DepDrop::classname(), [
                   'type' => DepDrop::TYPE_SELECT2,
                   'options'=>['id'=>'region-id'],
                   'pluginOptions'=>[
                       'depends'=>['city-id'],
                       'url'=>Url::to(['/complexes/regions'])
                   ]
               ]);
               ?>

               <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

           </div>
           <div class="col-md-4">

               <?php
               echo $form->field($model, 'type_id')->widget(Select2::className(), [
                   'data' => \common\models\TypeFlat::getTypesList(),
                   'theme' => Select2::THEME_BOOTSTRAP,
                   'options' => ['placeholder' => 'Type'],
                   'pluginOptions' => ['allowClear' => true],
               ]);
               ?>
               <?= $form->field($model, 'count_buildings')->textInput() ?>

               <?= $form->field($model, 'count_storeys')->textInput() ?>
           </div>
           <div class="col-md-4">

               <?= $form->field($model, 'tag_ids')->widget(Select2::classname(), [

                   'data' => \common\models\Tags::getTagsList(),

                   'options' => [

                       'placeholder' => 'Select tags ...',

                       'multiple' => 'true'

                   ],

                   'pluginOptions' => [

                       'allowClear' => true

                   ],

               ]);?>
           </div>
           <div class="col-md-4">

               <?= $form->field($model, 'infrastructure_ids')->widget(Select2::classname(), [

                   'data' => \common\models\Infrastructure::getInfrastructureList(),

                   'options' => [

                       'placeholder' => 'Select infrastructure ...',

                       'multiple' => 'true'

                   ],

                   'pluginOptions' => [

                       'allowClear' => true

                   ],

               ]);?>
           </div>


           <?php
                foreach ($options as $option)
                {
                    ?>
                    <div class="col-md-4">
                        <?= $form->field($model,"options[{$option['id']}]")->dropDownList(\yii\helpers\ArrayHelper::map($option['optionValues'],'id','value_tr'))->label($option['title']);
                        ?>
                    </div>
           <?php
                }
           ?>
       </div>


        <div class="row">
            <div class="col-md-12">
                <?php DynamicFormWidget::begin([
                    'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                    'widgetBody' => '.container-items', // required: css class selector
                    'widgetItem' => '.item', // required: css class
                    'limit' => 4, // the maximum times, an element can be cloned (default 999)
                    'min' => 1, // 0 or 1 (default 1)
                    'insertButton' => '.add-item', // css class
                    'deleteButton' => '.remove-item', // css class
                    'model' => $apartments[0],
                    'formId' => 'dynamic-form',
                    'formFields' => [
                        'price',
                        'count_rooms',
                        'area',
                    ],
                ]); ?>
                <div class="panel panel-default">
                    <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Apartment</h4>
                    </div>
                    <div class="panel-body">
                        <div class="container-items"><!-- widgetContainer -->
                            <?php foreach ($apartments as $i => $apartment): ?>
                                <div class="item panel panel-default"><!-- widgetBody -->
                                    <div class="panel-heading">
                                        <h3 class="panel-title pull-left">Apartment</h3>
                                        <div class="pull-right">
                                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-body">
                                        <?php
                                        // necessary for update action.
                                        if (! $apartment->isNewRecord) {
                                            echo Html::activeHiddenInput($apartment, "[{$i}]id");
                                        }
                                        ?>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <?= $form->field($apartment, "[{$i}]price")->textInput(['maxlength' => true]) ?>
                                            </div>
                                            <div class="col-sm-4">
                                                <?= $form->field($apartment, "[{$i}]count_rooms")->textInput(['maxlength' => true]) ?>
                                            </div>
                                            <div class="col-sm-4">
                                                <?= $form->field($apartment, "[{$i}]area")->textInput(['maxlength' => true]) ?>
                                            </div>
                                        </div>
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

</div>
