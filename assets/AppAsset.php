<?php

namespace app\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot'; // Refers to the 'web' directory
    public $baseUrl = '@web';      // URL corresponding to 'web'

    public $css = [
        'css/bootstrap.min.css',
        'css/plugins.min.css',
        'css/kaiadmin.min.css',
        'css/fonts.min.css',
        'css/custom.css',
    ];

    public $js = [
        'js/plugin/webfont/webfont.min.js',
        'js/core/jquery-3.7.1.min.js',
        'js/core/popper.min.js',
        'js/core/bootstrap.min.js',
        'js/plugin/jquery-scrollbar/jquery.scrollbar.min.js',
        'js/plugin/chart.js/chart.min.js',
        'js/plugin/sweetalert/sweetalert.min.js',
        'js/kaiadmin.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
