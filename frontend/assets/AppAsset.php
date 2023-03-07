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
        'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css',
        "https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.css",
        "https://cdn.jsdelivr.net/npm/charts.css/dist/charts.css",
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css',
//        'css/chart.min.css',
//        'css/prism.css',
        'css/mobile.css',
        'css/lightbox.min.css',
//        'css/Box.css',
        'fonts/stylesheet.css',

        'css/style.css',

    ];
    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js',
//        "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js",
//        "https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js",
//        'js/prism.js',
        'https://unpkg.com/aos@2.3.1/dist/aos.js',
        'https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js',

        "https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js",
        'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js',
        'js/chart.js',
        'js/chartext.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
