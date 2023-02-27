<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\sliders\Sliders $model */

$this->title = 'Create Sliders';
$this->params['breadcrumbs'][] = ['label' => 'Sliders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sliders-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
