<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ComplexOptions $model */

$this->title = 'Create Complex Options';
$this->params['breadcrumbs'][] = ['label' => 'Complex Options', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="complex-options-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
