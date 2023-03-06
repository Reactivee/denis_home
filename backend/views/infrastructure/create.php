<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Infrastructure $model */

$this->title = 'Create Infrastructure';
$this->params['breadcrumbs'][] = ['label' => 'Infrastructures', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="infrastructure-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
