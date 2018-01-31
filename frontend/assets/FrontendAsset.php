<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use common\assets\Html5shiv;
use yii\bootstrap\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

/**
 * Frontend application asset
 */
class FrontendAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $basePath = '@webroot';
    /**
     * @var string
     */
    public $baseUrl = '@web';

    /**
     * @var array
     */
    public $css = [
        'css/bootstrap.min.css', 
        'css/font-awesome.min.css', 
        'css/prettyPhoto.css', 
        'css/animate.min.css', 
        'css/main.css', 
        'css/responsive.css', 
    ];

    /**
     * @var array
     */
    public $js = [
        "js/jquery.js",
        "js/bootstrap.min.js",
        "js/jquery.prettyPhoto.js",
        "js/jquery.isotope.min.js",
        "js/main.js",
        "js/wow.min.js",
    ];

    /**
     * @var array
     */
    public $depends = [
        YiiAsset::class,
        BootstrapAsset::class,
        Html5shiv::class,
    ];
}
