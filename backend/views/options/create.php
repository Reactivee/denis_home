<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Options $model */
/** @var array $optionValues */

$this->title = 'Create Options';
$this->params['breadcrumbs'][] = ['label' => 'Options', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="options-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'optionValues' => $optionValues,
    ]) ?>

</div>
