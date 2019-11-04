<?php
$idTin = $_GET['idTin'];
$rowT = $dt-> LayTin($idTin);
?>

<div id="content">
    <div class="container">

        <div class="row">

            <!-- *** LEFT COLUMN ***
    _________________________________________________________ -->

            <div class="col-md-12" id="blog-post">


                <p class="text-muted text-uppercase mb-small text-right"><?=date( 'd/m/Y', strtotime($rowT['Ngay']) )?> </p>

                <div id="post-content">                                                         
                    <h2><?=$rowT['TieuDe']?></h2>               
                    <blockquote>
                        <p><?=$rowT['TomTat']?></p>
                    </blockquote>
                    <img style="display: block; margin-left: auto; margin-right: auto;" src="<?=$rowT['urlHinh']?>" class="img-responsive" alt="Example blog post alt">
                    <p><?=$rowT['Content']?></p>
                </div>
                <!-- /#post-content -->

                <!--<div id="comments">
                    <h4 class="text-uppercase">2 comments</h4>


                    <div class="row comment">
                        <div class="col-sm-3 col-md-2 text-center-xs">
                            <p>
                                <img src="img/blog-avatar2.jpg" class="img-responsive img-circle" alt="">
                            </p>
                        </div>
                        <div class="col-sm-9 col-md-10">
                            <h5 class="text-uppercase">Julie Alma</h5>
                            <p class="posted"><i class="fa fa-clock-o"></i> September 23, 2011 at 12:00 am</p>
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.
                                Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                            <p class="reply"><a href="#"><i class="fa fa-reply"></i> Reply</a>
                            </p>
                        </div>
                    </div>
                  


                    <div class="row comment last">

                        <div class="col-sm-3 col-md-2 text-center-xs">
                            <p>
                                <img src="img/blog-avatar.jpg" class="img-responsive img-circle" alt="">
                            </p>
                        </div>

                        <div class="col-sm-9 col-md-10">
                            <h5 class="text-uppercase">Louise Armero</h5>
                            <p class="posted"><i class="fa fa-clock-o"></i> September 23, 2012 at 12:00 am</p>
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.
                                Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                            <p class="reply"><a href="#"><i class="fa fa-reply"></i> Reply</a>
                            </p>
                        </div>

                    </div>
                  
                </div> -->
                <!-- /#comments -->


                <!--<div id="comment-form">

                    <h4 class="text-uppercase">Leave comment</h4>

                    <form>
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">Name <span class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Email <span class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="email">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="comment">Comment <span class="required">*</span>
                                    </label>
                                    <textarea class="form-control" id="comment" rows="4"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <button class="btn btn-template-main"><i class="fa fa-comment-o"></i> Post comment</button>
                            </div>
                        </div>


                    </form>

                </div> -->
                <!-- /#comment-form -->


            </div>
            <!-- /#blog-post -->

            <!-- *** LEFT COLUMN END *** -->

            <!-- *** RIGHT COLUMN ***
        _________________________________________________________ -->


            <!-- /.col-md-3 -->

            <!-- *** RIGHT COLUMN END *** -->


        </div>
        <!-- /.row -->

    </div>
            <!-- /.container -->
</div>
