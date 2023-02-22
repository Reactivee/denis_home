<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://unpkg.com/aos@2.3.1/dist/aos.css',
        'https://unpkg.com/swiper/swiper-bundle.min.css',
        "https://cdn.jsdelivr.net/npm/charts.css/dist/charts.css",
        "https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.css",

//        'css/site.css',
        'css/mobile.css',
        'css/lightbox.min.css',
//        'css/Box.css',
        'fonts/stylesheet.css',

        'css/style.css',

    ];
    public $js = [
        'https://unpkg.com/aos@2.3.1/dist/aos.js',
        "https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js",
        "https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js",
        'https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js',
        'https://unpkg.com/swiper/swiper-bundle.min.js',

//        'js/Box.js',
//        'js/lightbox.min.js',
        'https://cdn.jsdelivr.net/npm/chart.js',

        'https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js',

        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
