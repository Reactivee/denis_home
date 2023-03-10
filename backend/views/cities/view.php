<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Cities $model */
/** @var \yii\data\ActiveDataProvider $dataProvider */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cities-view">

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
    <div class="row">
        <div class="col-md-6">

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'title_tr',
                    'title_ru',
                    'title_en',
                    'text_en:ntext',
                    'text_tr:ntext',
                    'text_ru:ntext',
                    'link',
                    //'img',
                    [
                        'attribute' => 'img',
                        'format' => 'html',
                        'value' => function ($model) {
                            if ($model->img)
                                return Html::img($model->img, ['alt' => 'My logo', 'width' => '200px']);
                        }
                    ]
                ],
            ]) ?>
        </div>
        <div class="col-md-6">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'city_id',
                    'name_tr',
                    'name_ru',
                    'name_en',
                ],
            ]); ?>
        </div>
    </div>

</div>
