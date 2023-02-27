<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\TypeFlat $model */

$this->title = 'Update Type Flat: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Type Flats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="type-flat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
