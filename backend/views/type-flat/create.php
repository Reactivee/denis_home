<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\TypeFlat $model */

$this->title = 'Create Type Flat';
$this->params['breadcrumbs'][] = ['label' => 'Type Flats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-flat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
