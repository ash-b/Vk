<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/* @var $this \yii\web\View */
/* @var $content string */

$this->beginContent('@frontend/views/layouts/_clear.php')
?>
<style>
    .navbar-nav > li {
        margin-left: 8px;
        padding-bottom: 22px;
    }
    .custom-container{
        width:100%;
    }
    .navbar-inverse .navbar-brand {
        font-size: 20px;
    }
</style>

<header id="header">
    
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-4">
                    <div class="top-number"><p><i class="fa fa-phone-square"></i>  +0123 456 70 90</p></div>
                </div>
                <div class="col-sm-6 col-xs-8">
                 <div class="social">
                    <ul class="social-share">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li> 
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                    </ul>
                    <div class="search">
                        <form role="form">
                            <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                            <i class="fa fa-search"></i>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.container-->
</div><!--/.top-bar-->

<nav class="navbar navbar-inverse" role="banner">
    <div class="container custom-container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"><img src="" alt="Admission Guruji"></a>
        </div>
        
        <div class="collapse navbar-collapse navbar-right">
            <ul class="nav navbar-nav">
                <li><a href="/frontend/web/">Home</a></li>
                <li class="active"><a href="about-us.html">About Us</a></li>
                <?php 
                    $streams= common\models\Stream::find()->all();
                    
                    //echo "<pre>"; print_r($substreams); die;
                        foreach($streams as $stream){
                            $substreams=common\models\Stream::find()->where(['parent_stream'=>$stream->id])->all();
                            if(!empty($substreams)){
                                foreach($substreams as $substream){
                                    if($substream->parent_stream==$stream->id){
                                        $submenu_data[]=array($substream->id=>$substream->name);
                                    }
                                }
                                
                            }
                            if($stream->parent_stream==0){
                                //echo "<pre>"; print_r($submenu_data); die;
                ?>  
                                <?php if(!empty($submenu_data) && count($submenu_data)>0){ ?>
                                    <li class="dropdown"><a href="javascript:void(0)"><?= $stream->name ?></a>
                                        <ul class="dropdown-menu">
                                            <?php foreach($submenu_data as $submenu){ 
                                                    foreach($submenu as $key=>$sub){
                                            ?>
                                                    <li><a href="/frontend/web/stream/index?id=<?= $key ?>"><?= $sub ?></a></li>
                                            <?php } } ?>
                                        </ul>
                                    </li>
                                <?php }else{ ?>
                                        <li><a href="/frontend/web/stream/index?id=<?= $stream->id ?>"><?= $stream->name ?></a></li>
                                <?php } ?>
                <?php } 
                        $substreams=array();
                        $submenu_data=array();
                    } 
                ?>
               
<!--                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Streams<i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        
                            
                        
                        <li><a href="pricing.html">Pricing</a></li>
                        <li><a href="404.html">404</a></li>
                        <li><a href="shortcodes.html">Shortcodes</a></li>
                    </ul>
                </li>-->
                <li><a href="blog.html">Blog</a></li> 
                <li><a href="contact-us.html">Contact</a></li>                        
            </ul>
        </div>
    </div><!--/.container-->
</nav><!--/nav-->
</header><!--/header-->


<?php echo $content ?>


<section id="bottom">
    <div class="container wow fadeInDown animated" data-wow-duration="1000ms" data-wow-delay="600ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 600ms; animation-name: fadeInDown;">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="widget">
                    <h3>Company</h3>
                    <ul>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">We are hiring</a></li>
                        <li><a href="#">Meet the team</a></li>
                        <li><a href="#">Copyright</a></li>
                        <li><a href="#">Terms of use</a></li>
                        <li><a href="#">Privacy policy</a></li>
                        <li><a href="#">Contact us</a></li>
                    </ul>
                </div>    
            </div><!--/.col-md-3-->

            <div class="col-md-3 col-sm-6">
                <div class="widget">
                    <h3>Support</h3>
                    <ul>
                        <li><a href="#">Faq</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Forum</a></li>
                        <li><a href="#">Documentation</a></li>
                        <li><a href="#">Refund policy</a></li>
                        <li><a href="#">Ticket system</a></li>
                        <li><a href="#">Billing system</a></li>
                    </ul>
                </div>    
            </div><!--/.col-md-3-->

            <div class="col-md-3 col-sm-6">
                <div class="widget">
                    <h3>Developers</h3>
                    <ul>
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">SEO Marketing</a></li>
                        <li><a href="#">Theme</a></li>
                        <li><a href="#">Development</a></li>
                        <li><a href="#">Email Marketing</a></li>
                        <li><a href="#">Plugin Development</a></li>
                        <li><a href="#">Article Writing</a></li>
                    </ul>
                </div>    
            </div><!--/.col-md-3-->

            <div class="col-md-3 col-sm-6">
                <div class="widget">
                    <h3>Our Partners</h3>
                    <ul>
                        <li><a href="#">Adipisicing Elit</a></li>
                        <li><a href="#">Eiusmod</a></li>
                        <li><a href="#">Tempor</a></li>
                        <li><a href="#">Veniam</a></li>
                        <li><a href="#">Exercitation</a></li>
                        <li><a href="#">Ullamco</a></li>
                        <li><a href="#">Laboris</a></li>
                    </ul>
                </div>    
            </div><!--/.col-md-3-->
        </div>
    </div>
</section>

<footer id="footer" class="midnight-blue">
    <div class="container">
        <p class="pull-left">&copy; My Company <?php echo date('Y') ?></p>
        <p class="pull-right"><?php echo Yii::powered() ?></p>
    </div>
</footer>
<?php $this->endContent() ?>