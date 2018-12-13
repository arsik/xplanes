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
        'Bootstrap/dist/css/bootstrap-reboot.css',
        'Bootstrap/dist/css/bootstrap.css',
        'Bootstrap/dist/css/bootstrap-grid.css',
        'css/theme-styles.css',
        'css/blocks.css',
        'css/fonts.css',
        'css/jquery.mCustomScrollbar.min.css',
        'css/mediaelement-playlist-plugin.min.css',
        'css/mediaelementplayer.css',
        'css/magnific-popup.css',
        'css/croppie.min.css',
        'css/swiper.min.css',
        'css/bootstrap-select.css'
    ];
    public $js = [
        //'js/jquery-3.2.0.min.js',
        'js/material.min.js',
        'js/theme-plugins.js',
        'js/croppie.min.js',
        'js/main.js',
        'js/app.js',
        'js/ajax-pagination.js',
        'js/swiper.jquery.min.js',
        'js/selectize.min.js',
        'js/jquery.magnific-popup.min.js',
        //'js/mediaelement-and-player.min.js',
        //'js/mediaelement-playlist-plugin.min.js',
        'js/moment.min.js',
        'js/daterangepicker.min.js',
        'js/Chart.min.js',
        'js/chartjs-plugin-deferred.min.js',
        'js/circle-progress.min.js',
        'https://www.gstatic.com/charts/loader.js',
        'js/run-chart.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
