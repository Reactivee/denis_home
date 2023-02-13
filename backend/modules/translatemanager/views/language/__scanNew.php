<?php

/* @var $this View */
/* @var $newDataProvider ArrayDataProvider */

use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use yii\web\View;

?>

<?php if ($newDataProvider->totalCount > 0) : ?>

    <?php echo

    GridView::widget([
        'id' => 'added-source',
        'dataProvider' => $newDataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'category',
            'message',
        ],
    ]);

    ?>

<?php endif ?>
