<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\OptionValues $model */

$this->title = 'Create Option Values';
$this->params['breadcrumbs'][] = ['label' => 'Option Values', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="option-values-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
