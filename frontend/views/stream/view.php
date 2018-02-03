<?php
/**
 * @var $this \yii\web\View
 * @var $model \common\models\Page
 */
$this->title = $stream->name;

?>

<section id="blog" class="container">
    <div class="center">
        <h2><?= $stream->name;?> College</h2>
        <p class="lead">Pellentesque habitant morbi tristique senectus et netus et malesuada</p>
    </div>

    <div class="blog">
        <div class="row">
             <div class="col-md-8">
                <?php   if(!empty($colleges)){
                            foreach($colleges as $college){ 
                        
                ?>
                    <div class="blog-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-2 text-center">
                                <div class="entry-meta">
                                    <span id="publish_date">DTE CODE</span>
                                    <span><i class="fa fa-user"></i> <a href="#"><?= $college->dte_code?></a></span>
                                </div>
                                
                                <div class="entry-meta">
                                    <span id="publish_date">Fees</span>
                                    <span><i class="fa fa-user"></i> <a href="#">Rs.50,000</a></span>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-10 blog-content">
                                <a href="/frontend/web/college/index?id=<?= $college->id?>"><img class="img-responsive img-blog" src="/storage/source/<?= $college->image_path?>" width="100%" alt="" /></a>
                                <h3 class="college-name"><a href="/frontend/web/college/index?id=<?= $college->id?>"><?= $college->name?></a></h3>
                                <h4><?= $college->description?></h4>
                                <a class="btn btn-primary readmore" href="/frontend/web/college/index?id=<?= $college->id?>">Read More <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>    
                    </div><!--/.blog-item-->
                <?php } }else{ ?>
                        <div class="blog-item">
                            <div class="col-sm-12 col-xs-12 text-center blog-content">
                                    <div class="empty-condition">  
                                        <img src="/images/oops.png"/>
                                        <br>
                                        <h3>No College List............!</h3>
                                    </div>
                            </div>
                        </div>
                <?php } ?>
                    
<!--                <ul class="pagination pagination-lg">
                    <li><a href="#"><i class="fa fa-long-arrow-left"></i>Previous Page</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">Next Page<i class="fa fa-long-arrow-right"></i></a></li>
                </ul>/.pagination-->
            </div><!--/.col-md-8-->

            <aside class="col-md-4">
                <div class="widget search">
                    <input  type="text" class="form-control search_box" placeholder="Search College" name="search" id="search" onkeyup="search(this)" autocomplete="off"> 
                </div><!--/.search-->

                <div class="widget categories">
                    <h3>Recent Comments</h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="single_comments">
                                <img src="/storage/source/images/blog/avatar3.png" alt=""  />
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
                                <div class="entry-meta small muted">
                                    <span>By <a href="#">Alex</a></span <span>On <a href="#">Creative</a></span>
                                </div>
                            </div>
                            <div class="single_comments">
                                <img src="/storage/source/images/blog/avatar3.png" alt=""  />
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
                                <div class="entry-meta small muted">
                                    <span>By <a href="#">Alex</a></span <span>On <a href="#">Creative</a></span>
                                </div>
                            </div>
                            <div class="single_comments">
                                <img src="/storage/source/images/blog/avatar3.png" alt=""  />
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
                                <div class="entry-meta small muted">
                                    <span>By <a href="#">Alex</a></span <span>On <a href="#">Creative</a></span>
                                </div>
                            </div>

                        </div>
                    </div>                     
                </div><!--/.recent comments-->


                <div class="widget categories">
                    <h3>Streams</h3>
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="blog_category">
                                <?php foreach($streams as $stream){ ?>
                                <li><a href="/frontend/web/stream/index?id=<?= $stream->id?>"><?= $stream->name?></a></li>
                                <?php } ?>    
                            </ul>
                        </div>
                    </div>                     
                </div><!--/.categories-->

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
                        <li><a href="#"><img src="/storage/source/images/blog/gallery1.png" alt="" /></a></li>
                        <li><a href="#"><img src="/storage/source/images/blog/gallery2.png" alt="" /></a></li>
                        <li><a href="#"><img src="/storage/source/images/blog/gallery3.png" alt="" /></a></li>
                        <li><a href="#"><img src="/storage/source/images/blog/gallery4.png" alt="" /></a></li>
                        <li><a href="#"><img src="/storage/source/images/blog/gallery5.png" alt="" /></a></li>
                        <li><a href="#"><img src="/storage/source/images/blog/gallery6.png" alt="" /></a></li>
                    </ul>
                </div><!--/.blog_gallery-->
                    </aside>  
        </div><!--/.row-->
    </div>
</section><!--/#blog-->
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