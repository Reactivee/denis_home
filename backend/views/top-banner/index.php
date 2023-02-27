<?php

use common\models\TopBanner;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TopBannerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Top Banners';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="top-banner-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Top Banner', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
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
            'text_tr',
            'text_ru',
            'text_en',
            'link',
            [
                'attribute' => 'img_path',
                'format' => "raw",
                'value' => function ($model) {
                    return Html::img($model->img_path, ['width' => '100px']);
                }
            ],
            [
                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, TopBanner $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'id' => $model->id]);
//                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
