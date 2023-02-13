<?php

/* @var $this yii\web\View */
/* @var $model backend\modules\translatemanager\models\Language */

$this->title = Yii::t('language', 'Update {modelClass}: ', ['modelClass' => 'Language',]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('language', 'Languages'), 'url' => ['list']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->language_id]];
$this->params['breadcrumbs'][] = Yii::t('language', 'Update');
?>
<div class="language-update box box-primary">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>