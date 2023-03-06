<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Complexes $model */
/** @var array $options */
/** @var array $apartments */

$this->title = 'Create Complexes';
$this->params['breadcrumbs'][] = ['label' => 'Complexes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="complexes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'options' => $options,
        'apartments' => $apartments,
    ]) ?>

</div>
