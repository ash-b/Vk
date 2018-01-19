<?php
/**
 * @var $this yii\web\View
 */
use backend\assets\BackendAsset;
use backend\models\SystemLog;
use backend\widgets\Menu;
use common\models\TimelineEvent;
use yii\bootstrap\Alert;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\log\Logger;
use yii\widgets\Breadcrumbs;

$bundle = yiister\gentelella\assets\Asset::register($this);
?>
<?php $this->beginContent('@backend/views/layouts/base.php'); ?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="nav-<?= !empty($_COOKIE['menuIsCollapsed']) && $_COOKIE['menuIsCollapsed'] == 'true' ? 'sm' : 'md' ?>" >
    <?php $this->beginBody(); ?>
    <div class="container body">

        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="/" class="site_title"><i class="fa fa-paw"></i> <span><?php echo Yii::$app->name ?></span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="<?php echo Yii::$app->user->identity->userProfile->getAvatar($this->assetManager->getAssetUrl($bundle, 'img/anonymous.jpg')) ?>" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><?php echo Yii::$app->user->identity->username ?></h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3>General</h3>
                            <?php echo \yiister\gentelella\widgets\Menu::widget([
                                'options' => ['class' => 'sidebar-menu'],
                                'linkTemplate' => '<a href="{url}">{icon}<span>{label}</span>{badge}</a>',
                                'submenuTemplate' => "\n<ul class=\"treeview-menu\">\n{items}\n</ul>\n",
                                'activateParents' => true,
                                'items' => [
                                    [
                                        'label' => Yii::t('backend', 'Main'),
                                        'options' => ['class' => 'header']
                                    ],
                                    [
                                        'label' => Yii::t('backend', 'Timeline'),
                                        'icon' => 'th',
                                        'url' => ['/timeline-event/index'],
                                        'badge' => TimelineEvent::find()->today()->count(),
                                        'badgeBgClass' => 'label-success',
                                    ],
                                    [
                                        'label' => Yii::t('backend', 'City'),
                                        'icon' => 'th',
                                        'url' => ['/city/index'],
                                    ],
                                    [
                                        'label' => Yii::t('backend', 'Branch'),
                                        'icon' => 'th',
                                        'url' => ['/branch/index'],
                                    ],
                                    [
                                        'label' => Yii::t('backend', 'Caste'),
                                        'icon' => 'th',
                                        'url' => ['/caste/index'],
                                    ],
                                    [
                                        'label' => Yii::t('backend', 'University'),
                                        'icon' => 'th',
                                        'url' => ['/university/index'],
                                    ],
                                    [
                                        'label' => Yii::t('backend', 'College'),
                                        'icon' => 'th',
                                        'url' => ['/college/index'],
                                    ],
                                    [
                                        'label' => Yii::t('backend', 'Stream'),
                                        'icon' => 'th',
                                        'url' => ['/stream/index'],
                                    ],
                                    [
                                        'label' => Yii::t('backend', 'Fees Structure'),
                                        'icon' => 'th',
                                        'url' => ['/fees-structure/index'],
                                    ],
                                    [
                                        'label' => Yii::t('backend', 'Gallery'),
                                        'icon' => 'th',
                                        'url' => ['/gallery/index'],
                                    ],
                                   
                                    [
                                        'label' => Yii::t('backend', 'Users'),
                                        'icon' => 'table',
                                        'url' => ['/user/index'],
                                        'visible' => Yii::$app->user->can('administrator')
                                    ],
                                    [
                                        'label' => Yii::t('backend', 'Widgets'),
                                        'icon' => 'table',
                                        'url' => ['/widget-carousel/index'],
                                        'visible' => Yii::$app->user->can('administrator')
                                    ],
                                    [
                                        'label' => Yii::t('backend', 'Settings'),
                                        'icon' => 'th',
                                        'url' => ['/setting/index'],
                                        'visible' => Yii::$app->user->can('administrator')
                                    ],
                                    
                                ]
                                ]) ?>
                            </div>

                        </div>
                        <!-- /sidebar menu -->

                        <!-- /menu footer buttons -->
                        <div class="sidebar-footer hidden-small">
                            <!-- <a data-toggle="tooltip" data-placement="top" title="Settings">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Lock">
                                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Logout">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a> -->
                        </div>
                        <!-- /menu footer buttons -->
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">

                    <div class="nav_menu">
                        <nav class="" role="navigation">
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <img src="<?php echo Yii::$app->user->identity->userProfile->getAvatar($this->assetManager->getAssetUrl($bundle, 'img/anonymous.jpg')) ?>" alt=""><?php echo Yii::$app->user->identity->username ?>
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        
                                        <li class="user-footer">
                                    
                                        <?php echo Html::a(Yii::t('backend', 'Profile'), ['/sign-in/profile'], ['class' => '']) ?>
                                    
                                    
                                        <?php echo Html::a(Yii::t('backend', 'Account'), ['/sign-in/account'], ['class' => '']) ?>
                                    
                                    
                                        <?php echo Html::a(Yii::t('backend', 'Logout'), ['/sign-in/logout'], ['class' => '', 'data-method' => 'post']) ?>
                                    
                                        </li>
                                
                                        
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">
                    <?php if (isset($this->params['h1'])): ?>
                        <div class="page-title">
                            <div class="title_left">
                                <h1><?= $this->params['h1'] ?></h1>
                            </div>
                            <div class="title_right">
                                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search for...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button">Go!</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="clearfix"></div>

                    <?= $content ?>
                </div>
                <!-- /page content -->
                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                        Developed And Designed By <a href="http://ashishbubne.in" rel="nofollow" target="_blank">Ashish Bubne</a><br />
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>

        </div>

        <div id="custom_notifications" class="custom-notifications dsp_none">
            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
            </ul>
            <div class="clearfix"></div>
            <div id="notif-group" class="tabbed_notifications"></div>
        </div>
        <!-- /footer content -->
        <?php $this->endBody(); ?>
    </body>
    </html>
    <?php $this->endPage(); ?>
