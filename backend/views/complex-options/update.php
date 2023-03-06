<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ComplexOptions $model */

$this->title = 'Update Complex Options: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Complex Options', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="complex-options-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
