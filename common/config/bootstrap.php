<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@frontendWeb', dirname(dirname(__DIR__)) . '/frontend/web');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@api', dirname(dirname(__DIR__)) . '/api');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('@rootDir', dirname(dirname(__DIR__)));
Yii::setAlias('@uploadsUrl', '/uploads');
Yii::setAlias('@log', dirname(dirname(__DIR__)) . '/log');
Yii::setAlias('@uploadsPath', dirname(dirname(__DIR__)) . Yii::getAlias('@uploadsUrl'));



