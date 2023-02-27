<?php

use common\models\Team;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\TeamSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Teams';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Team', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name_tr',
            'name_en',
            'name_ru',
            'prof_ru',
            //'prof_tr',
            //'prof_en',
            //'phone',
            //'email:email',
            //'google',
            //'facebook',
            //'instagram',
            //'telegram',
            //'updated_at',
            //'created_at',
            [
                'attribute' => 'img_path',
                'format' => "raw",
                'value' => function ($model) {
                    if ($model->img)
                        return Html::img($model->img, ['width' => '100px']);
                    else
                        return '';
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Team $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
