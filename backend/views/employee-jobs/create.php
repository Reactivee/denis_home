<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\employee\EmployeeJobs $model */

$this->title = 'Create Employee Jobs';
$this->params['breadcrumbs'][] = ['label' => 'Employee Jobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-jobs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
