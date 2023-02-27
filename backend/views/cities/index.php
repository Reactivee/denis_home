<?php

use common\models\Cities;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\CitiesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Cities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cities-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Cities', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title_tr',
            'title_ru',
            'title_en',
            'text_en:ntext',
            //'text_tr:ntext',
            //'text_ru:ntext',
            //'img',
            //'link',
            [
                'attribute' => 'img',
                'format' => 'html',
                'value' => function ($model) {
                    if ($model->img)
                        return Html::img($model->img, ['alt' => 'My logo', 'width' => '200px']);
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Cities $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
