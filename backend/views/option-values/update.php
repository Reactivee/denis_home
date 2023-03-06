<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\OptionValues $model */

$this->title = 'Update Option Values: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Option Values', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="option-values-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
