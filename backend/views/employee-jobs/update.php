<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\employee\EmployeeJobs $model */

$this->title = 'Update Employee Jobs: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Employee Jobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="employee-jobs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
