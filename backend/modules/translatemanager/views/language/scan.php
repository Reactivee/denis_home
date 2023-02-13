<?php

/* @var $this yii\web\View */
/* @var $newDataProvider ArrayDataProvider */
/* @var $oldDataProvider ArrayDataProvider */

use yii\data\ArrayDataProvider;

$this->title = Yii::t('language', 'Scanning project');
$this->params['breadcrumbs'][] = ['label' => Yii::t('language', 'Languages'), 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-default">
    <div class="box-body">

        <div id="w2-info" class="alert-info alert fade in">
            <?php echo Yii::t('language', '{n, plural, =0{No new entries} =1{One new entry} other{# new entries}} were added!', ['n' => $newDataProvider->totalCount]) ?>
        </div>

        <?php echo $this->render('__scanNew', [
            'newDataProvider' => $newDataProvider,
        ]) ?>

        <div id="w2-danger" class="alert-danger alert fade in">
            <?php echo Yii::t('language', '{n, plural, =0{No entries} =1{One entry} other{# entries}} remove!', ['n' => $oldDataProvider->totalCount]) ?>
        </div>

        <?php echo $this->render('__scanOld', [
            'oldDataProvider' => $oldDataProvider,
        ]) ?></div>
</div>