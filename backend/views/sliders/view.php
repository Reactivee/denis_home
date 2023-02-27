<?php

use backend\models\sliders\SliderItems;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\sliders\Sliders $model */
/** @var backend\models\sliders\SliderItemsSearch $searchModel */
/** @var \yii\data\ActiveDataProvider $dataProvider */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Sliders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sliders-view">

    <div class="row">
        <div class="col-md-6">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'key',
                    'name',
                    [
                        'attribute' => 'status',
                        'value' => $model->getStatusName()
                    ],
                    [
                        'attribute' => 'created_at',
                        'value' => $model->getStatusName()
                    ],
                ],
            ]) ?>
        </div>
    </div>

    <div class="row">

        <p>
            <?= Html::a('Create Slider Item', ['create-item','slider_id' => $model->id], ['class' => 'btn btn-success']) ?>
        </p>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'title_ru',
                'title_en',
                'title_tr',
                'description_ru:ntext',
                'weight',
                //'status',
                [
                        'attribute' => 'status',
                        'format' => 'raw',
                    'value' => function(SliderItems $model)
                    {
                        return $model->getStatusName();
                    }
                ],
                [
                        'attribute' => 'image',
                        'format' => 'raw',
                    'value' => function(SliderItems $model)
                    {
                        if ($model->image != null && file_exists(Yii::getAlias('@rootDir') . $model->image))
                            return '<img src="'.$model->image.'" style="width:100px">';
                    }
                ],
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, SliderItems $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    },
                    'template' => '{update-item} {delete-item}',
                    'buttons' => [
                        'update-item' => function ($url) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                'title' => Yii::t('yii', 'Update'),
                                'data-pjax' => 0,
                            ]);
                        },
                        'delete-item' => function ($url) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                'title' => Yii::t('yii', 'Delete'),
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]);
                        }
                    ]
                ],
            ],
        ]); ?>
    </div>

</div>
