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
        'themes/bucket/html/bs3/css/bootstrap.min.css',
        'themes/bucket/html/js/jquery-ui/jquery-ui-1.10.1.custom.min.css',
        'themes/bucket/html/css/bootstrap-reset.css',
        'themes/bucket/html/font-awesome/css/font-awesome.css',
        'themes/bucket/html/js/jvector-map/jquery-jvectormap-1.2.2.css',
        'themes/bucket/html/css/clndr.css',
        'themes/bucket/html/js/css3clock/css/style.css',
        'themes/bucket/html/js/morris-chart/morris.css',
        'themes/bucket/html/css/style.css',
        'themes/bucket/html/css/style-responsive.css',
    ];
    public $js = [
       //'themes/bucket/html/js/jquery.js',
        'themes/bucket/html/js/jquery-ui/jquery-ui-1.10.1.custom.min.js',
        'themes/bucket/html/bs3/js/bootstrap.min.js',//ชนกับส่งออก
        'themes/bucket/html/js/jquery.dcjqaccordion.2.7.js',
        'themes/bucket/html/js/jquery.scrollTo.min.js',
        'themes/bucket/html/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js',
        'themes/bucket/html/js/jquery.nicescroll.js',
        'themes/bucket/html/js/skycons/skycons.js',
        'themes/bucket/html/js/jquery.scrollTo/jquery.scrollTo.js',
        '//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js',
        'themes/bucket/html/js/calendar/clndr.js',
        'http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js',
        'themes/bucket/html/js/calendar/moment-2.2.1.js',
        'themes/bucket/html/js/evnt.calendar.init.js',
        'themes/bucket/html/js/jvector-map/jquery-jvectormap-1.2.2.min.js',
        'themes/bucket/html/js/jvector-map/jquery-jvectormap-us-lcc-en.js',
        'themes/bucket/html/js/gauge/gauge.js',
        'themes/bucket/html/js/css3clock/js/css3clock.js',
        'themes/bucket/html/js/easypiechart/jquery.easypiechart.js',
        'themes/bucket/html/js/sparkline/jquery.sparkline.js',
        'themes/bucket/html/js/morris-chart/morris.js',
        'themes/bucket/html/js/morris-chart/raphael-min.js',
        'themes/bucket/html/js/flot-chart/jquery.flot.js',
        'themes/bucket/html/js/flot-chart/jquery.flot.tooltip.min.js',
        'themes/bucket/html/js/flot-chart/jquery.flot.resize.js',
        'themes/bucket/html/js/flot-chart/jquery.flot.pie.resize.js',
        'themes/bucket/html/js/flot-chart/jquery.flot.animator.min.js',
        'themes/bucket/html/js/flot-chart/jquery.flot.growraf.js',
      //   'themes/bucket/html/js/dashboard.js',
        'themes/bucket/html/js/jquery.customSelect.min.js',
        'themes/bucket/html/js/scripts.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
