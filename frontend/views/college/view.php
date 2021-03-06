<?php
/**
 * @var $this \yii\web\View
 * @var $model \common\models\Page
 */
$this->title = $college->name;
$strm= common\models\Stream::find()->where(['id'=>$college->substream_id])->one();
if(empty($strm)){
    $strm= common\models\Stream::find()->where(['id'=>$college->stream_id])->one();
}
$this->params['breadcrumbs'][] = ['label' => $strm->name, 'url' => ['stream/index','id'=>$college->stream_id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<section id="blog" class="container">
    <div class="center">
        <h2><?= $college->name?></h2>
        <p class="lead">Pellentesque habitant morbi tristique senectus et netus et malesuada</p>
    </div>

    <div class="blog">
        <div class="row">
            <div class="col-md-8">
                <div class="blog-item">
                    <img class="img-responsive img-blog" src="/storage/source/<?= $college->image_path?>" width="100%" alt="" />
                        <div class="row">  
                            <div class="col-xs-12 col-sm-2 text-center">
                                <div class="entry-meta">
                                    <span id="publish_date">DTE Code</span>
                                    <span><i class="fa fa-user"></i> <a href="#"><?= $college->dte_code?></a></span>
                                </div>
                                <div class="entry-meta">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-10 blog-content">
                                <h2><?= $college->name?></h2>
                                <p><?= $college->description?></p>
                                <div class="post-tags">
                                    <strong>Tag:</strong> <a href="#">Cool</a> / <a href="#">Creative</a> / <a href="#">Dubttstep</a>
                                </div>

                            </div>
                        </div>
                </div><!--/.blog-item-->
                <?php if(!empty($college_attachments)){ ?>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <div class="">
                                 <h1 id="comments_title">Gallery</h1>
                                <div class="gallery-w3lsrow">
                                    <?php foreach($college_attachments as $college_attachment){ ?>
                                        <div class="col-sm-4 col-xs-6 gallery-grids">
                                            <div class="w3ls-hover">
                                                <a href="/storage/source/<?= $college_attachment->path?>" data-lightbox="example-set" data-title="<?= $college_attachment->name?>">     
                                                <img src="/storage/source/<?= $college_attachment->path?>" class="img-responsive zoom-img" alt=""/>
                                                                            </a>                                 
                                            </div> 
                                        </div> 
                                    <?php } ?>

                                    <div class="clearfix"> </div> 
                                </div>  
                            </div>
                        </div>

                    </div>
                <?php } ?>

                    <div class="media reply_section">
                        <div class="pull-left post_reply text-center">
                            <a href="#"><img src="/images/blog/boy.png" class="img-circle" alt="" /></a>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i> </a></li>
                            </ul>
                        </div>
                        <div class="media-body post_reply_content">
                            <h3>Antone L. Huges</h3>
                            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariaturp</p>
                            <p><strong>Web:</strong> <a href="http://www.shapebootstrap.net">www.shapebootstrap.net</a></p>
                        </div>
                    </div> 

                    <h1 id="comments_title">5 Comments</h1>
                    <div class="media comment_section">
                        <div class="pull-left post_comments">
                            <a href="#"><img src="images/blog/girl.png" class="img-circle" alt="" /></a>
                        </div>
                        <div class="media-body post_reply_comments">
                            <h3>Marsh</h3>
                            <h4>NOVEMBER 9, 2013 AT 9:15 PM</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>
                            <a href="#">Reply</a>
                        </div>
                    </div> 
                    <div class="media comment_section">
                        <div class="pull-left post_comments">
                            <a href="#"><img src="images/blog/boy2.png" class="img-circle" alt="" /></a>
                        </div>
                        <div class="media-body post_reply_comments">
                            <h3>Marsh</h3>
                            <h4>NOVEMBER 9, 2013 AT 9:15 PM</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>
                            <a href="#">Reply</a>
                        </div>
                    </div> 
                    <div class="media comment_section">
                        <div class="pull-left post_comments">
                            <a href="#"><img src="images/blog/boy3.png" class="img-circle" alt="" /></a>
                        </div>
                        <div class="media-body post_reply_comments">
                            <h3>Marsh</h3>
                            <h4>NOVEMBER 9, 2013 AT 9:15 PM</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>
                            <a href="#">Reply</a>
                        </div>
                    </div> 


                    <div id="contact-page clearfix">
                        <div class="status alert alert-success" style="display: none"></div>
                        <div class="message_heading">
                            <h4>Leave a Replay</h4>
                            <p>Make sure you enter the(*)required information where indicate.HTML code is not allowed</p>
                        </div> 

                        <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="sendemail.php" role="form">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Name *</label>
                                        <input type="text" class="form-control" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Email *</label>
                                        <input type="email" class="form-control" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>URL</label>
                                        <input type="url" class="form-control">
                                    </div>                    
                                </div>
                                <div class="col-sm-7">                        
                                    <div class="form-group">
                                        <label>Message *</label>
                                        <textarea name="message" id="message" required="required" class="form-control" rows="8"></textarea>
                                    </div>                        
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg" required="required">Submit Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>     
                    </div><!--/#contact-page-->
                </div><!--/.col-md-8-->

            <aside class="col-md-4">
<!--                <div class="widget search">
                    <form role="form">
                            <input type="text" class="form-control search_box" autocomplete="off" placeholder="Search Here">
                    </form>
                </div>/.search-->

                <div class="widget categories">
                    <h3 id="publish_date">College Type</h3>
                    <p><?= $college->college_type?></p>
                    <h3 id="publish_date">University</h3>
                    <?php  $university= common\models\University::find()->where(['id'=>$college->university_id])->one(); ?>
                    <p><?= $university->name?></p>
                    <h3 id="publish_date">Address</h3>
                    <p><?= $college->address?></p>
                    <h3 id="publish_date">Branches with Intake</h3>
                    <?php $branches= common\models\CollegeHasBranch::find()->where(['college_id'=>$college->id])->all(); 
                        if(!empty($branches)){
                    ?>
                    <table class="table">
                            <tbody>
                                <?php foreach($branches as $branch){ ?>
                                    <tr>
                                        <td><?php $branch_name= common\models\Branch::find()->where(['id'=>$branch->branch_id])->one();
                                                echo $branch_name->name;
                                            ?>
                                        </td>
                                        <td class="text-center"><?= $branch->intake;?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php }?>
                </div><!--/.recent comments-->


<!--                <div class="widget categories">
                    <div class="div-left-border"><h3>Streams</h3></div>
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="blog_category">
                                <?php //foreach($streams as $stream){ ?>
                                <li><a href="/frontend/web/stream/index?id=<?php // $stream->id?>"><?php // $stream->name?></a></li>
                                <?php //} ?>    
                            </ul>
                        </div>
                    </div>                     
                </div>/.categories-->

                <div class="widget archieve">
                    <h3>Archieve</h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="blog_archieve">
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> December 2013 <span class="pull-right">(97)</span></a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> November 2013 <span class="pull-right">(32)</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> October 2013 <span class="pull-right">(19)</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> September 2013 <span class="pull-right">(08)</a></li>
                            </ul>
                        </div>
                    </div>                     
                </div><!--/.archieve-->

                <div class="widget tags">
                    <h3>Tag Cloud</h3>
                    <ul class="tag-cloud">
                        <li><a class="btn btn-xs btn-primary" href="#">Apple</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Barcelona</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Office</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Ipod</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Stock</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Race</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">London</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Football</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Porche</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Gadgets</a></li>
                    </ul>
                </div><!--/.tags-->

                            <div class="widget blog_gallery">
                    <h3>Our Gallery</h3>
                    <ul class="sidebar-gallery">
                        <li><a href="#"><img src="images/blog/gallery1.png" alt="" /></a></li>
                        <li><a href="#"><img src="images/blog/gallery2.png" alt="" /></a></li>
                        <li><a href="#"><img src="images/blog/gallery3.png" alt="" /></a></li>
                        <li><a href="#"><img src="images/blog/gallery4.png" alt="" /></a></li>
                        <li><a href="#"><img src="images/blog/gallery5.png" alt="" /></a></li>
                        <li><a href="#"><img src="images/blog/gallery6.png" alt="" /></a></li>
                    </ul>
                </div><!--/.blog_gallery-->


            </aside>     

        </div><!--/.row-->

     </div><!--/.blog-->

</section><!--/#blog--><!--/#blog-->
<script type="text/javascript">
    function search(ths){
            
        var searchterm = jQuery("#search").val().trim().toLowerCase();
        if (searchterm.length == 0){
            jQuery(".blog-item").show();
            return  true;
        }
        jQuery(".blog-item").hide();
        jQuery(".college-name").each(function () {
            if (jQuery(this).text().toLowerCase().indexOf(searchterm) >= 0 ){
                jQuery(this).closest(".blog-item").show();
            }

        });
    
    }
</script>