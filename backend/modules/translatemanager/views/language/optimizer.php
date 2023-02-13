<?php

/* @var $this View */
/* @var $newDataProvider ArrayDataProvider */

use yii\data\ArrayDataProvider;
use yii\web\View;

$this->title = Yii::t('language', 'Optimise database');
$this->params['breadcrumbs'][] = ['label' => Yii::t('language', 'Languages'), 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-default">
    <div class="box-body">
        <div id="w2-info" class="alert-info alert fade in">
            <?php echo Yii::t('language', '{n, plural, =0{No entries} =1{One entry} other{# entries}} were removed!', ['n' => $newDataProvider->totalCount]) ?>
        </div>

        <?php echo $this->render('__scanNew', [
            'newDataProvider' => $newDataProvider,
        ]) ?>

    </div>
</div>
