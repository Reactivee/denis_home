<?php

use common\models\Infrastructure;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\InfrastructureSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Infrastructures';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="infrastructure-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Infrastructure', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title_tr',
            'title_en',
            'title_ru',
            'icon',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Infrastructure $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
