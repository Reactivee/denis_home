<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Team $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Teams', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="team-view">

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
            'name_tr',
            'name_en',
            'name_ru',
            'prof_ru',
            'prof_tr',
            'prof_en',
            'phone',
            'email:email',
            'google',
            'facebook',
            'instagram',
            'telegram',
            'updated_at',
            'created_at',
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
