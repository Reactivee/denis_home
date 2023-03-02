<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Cities $model */
/** @var array $regions */

$this->title = 'Create Cities';
$this->params['breadcrumbs'][] = ['label' => 'Cities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cities-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'regions' => $regions,

    ]) ?>

</div>
