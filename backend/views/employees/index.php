<?php

use backend\models\employee\Employees;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\employee\EmployeesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employees-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Employees', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                    'attribute' => 'job_id',
                'value' => function(Employees $model)
                {
                    return $model->job->job_name_en;
                }
            ],
            'job_id',
            'full_name',
            'phone_number',
            'telegram',
            //'facebook',
            //'twitter',
            //'instagram',
            //'created_at',
            //'updated_at',
            //'image',
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => function(Employees $model)
                {
                    if ($model->image != null && file_exists(Yii::getAlias('@rootDir') . $model->image))
                        return '<img src="'.$model->image.'" style="width:100px">';
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Employees $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
