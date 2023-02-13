<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css',

        'css/site.css',
        'css/backend.css',
        'css/print.css',
        'css/style.css',

    ];
    public $js = [
        'js/main.js'
        //'js/jquery.caret.js',
        //'js/jquery.mobilePhoneNumber.js',
        //'js/sweetalert.js',
    ];
    /*public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];*/
    public $depends = [
        'backend\extensions\adminlte\assets\AdminLteAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
