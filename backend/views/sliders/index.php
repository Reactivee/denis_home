<?php

use backend\models\sliders\Sliders;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\sliders\SlidersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Sliders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sliders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Sliders', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'key',
            'name',
            [
                    'attribute' => 'status',
                    'value' => function(Sliders $model)
                    {
                        return $model->getStatusName();
                    }
            ],
            [
                    'attribute' => 'created_at',
                    'value' => function(Sliders $model)
                    {
                        return date('d.m.Y',$model->created_at);
                    }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Sliders $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
