<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TopBanner */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Top Banners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="top-banner-view">

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
            'title_tr',
            'title_ru',
            'title_en',
            'text_tr',
            'text_ru',
            'text_en',
            'status',
            'link',
            [
                'attribute' => 'img_path',
                'format' => 'html',
                'value' => function ($model) {

                    return Html::img($model->img_path, ['alt' => 'My logo', 'width' => '200px']);
                }
            ]
        ],
    ]) ?>

</div>
