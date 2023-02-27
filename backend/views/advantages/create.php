<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Advantages $model */

$this->title = 'Create Advantages';
$this->params['breadcrumbs'][] = ['label' => 'Advantages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advantages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
