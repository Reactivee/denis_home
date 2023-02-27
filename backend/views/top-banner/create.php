<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TopBanner */

$this->title = 'Create Top Banner';
$this->params['breadcrumbs'][] = ['label' => 'Top Banners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="top-banner-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
