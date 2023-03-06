<?php

use common\models\Apartments;
use common\models\Complexes;
use common\models\ComplexOptions;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Complexes $model */
/** @var \yii\data\ActiveDataProvider $dataProvider */
/** @var \yii\data\ActiveDataProvider $optionsDataProvider */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Complexes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="complexes-view">

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
        <div class="col-md-4">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'address:ntext',
                    [
                        'attribute' => 'city_id',
                        'value' => function(Complexes $model)
                        {
                            if ($model->city_id)
                            return $model->city->title_tr;
                        }
                    ],
                    [
                        'attribute' => 'region_id',
                        'value' => $model->region_id!=null?$model->region->name_tr:''
                    ],
                    [
                        'attribute' => 'type_id',
                        'value' => $model->type_id!=null?$model->type->title_tr:''
                    ],
                    'description_tr:ntext',
                    'description_ru:ntext',
                    'description_en:ntext',
                    'count_buildings:ntext',
                    'count_storeys:ntext',
                    [
                            'attribute' => 'created_at',
                            'value' => function($model)
                            {
                                return date('d.m.Y',$model->created_at);
                            }
                    ],
                    [
                            'attribute' => 'tag_ids',
                            'label' => 'tags',
                            'format' => 'raw',
                            'value' => function(Complexes $model)
                            {
                                foreach ($model->tags as $tag)
                                {
                                    $return .='<span class="btn btn-primary">'.$tag->title_tr.'</span>';
                                }

                                return $return;
                            }
                    ],
                ],
            ]) ?>
        </div>
        <div class="col-md-8">
            <h2>Apartments</h2>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'price',
                    'count_rooms',
                    'area',
                ],
            ]); ?>

            <h2>Options</h2>
            <?= GridView::widget([
                'dataProvider' => $optionsDataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                            'attribute' => 'option_id',
                        'label' => 'Option',
                        'value' => function(ComplexOptions $model){
                                if ($model->option_id != null)
                                    return $model->option->title_tr;
                        },
                    ],
                    [
                            'attribute' => 'value_id',
                        'label' => 'Value',
                        'value' => function(ComplexOptions $model){
                                if ($model->value_id != null)
                                    return $model->value->value_tr;
                        },
                    ],
                ],
            ]); ?>
        </div>
    </div>

</div>
