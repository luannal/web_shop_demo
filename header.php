<header>

            <!-- *** TOP ***
_________________________________________________________ -->
            <div id="top">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-5 contact">
                            <p class="hidden-sm hidden-xs">Liên hệ ngay với chúng tôi theo số +028 123 456 78 hoặc sdt@.com.vn</p>
                            
                            </p>
                        </div>
                        <div class="col-xs-7">
                            <div class="social">
                                <a href="#" class="facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                <a href="#" class="twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                            </div>

                            <div class="login">
                                <?php if (isset($_SESSION['login_id'])==false) {?>
                                <a href="<?=BASE_URL?>dang-nhap/"><i class="fa fa-sign-in"></i> <span class="hidden-xs text-uppercase">Đăng nhập</span></a>
                                <a href="<?=BASE_URL?>dang-ky/"><i class="fa fa-user"></i> <span class="hidden-xs text-uppercase">Đăng ký</span></a>
                                <?php }else { ?>
                                    <span id="hoten" class="text-uppercase">
                                    <?=$_SESSION['login_hoten']?>
                                    </span>&nbsp;   &nbsp;          
                                    <a href="thoat.php">Thoát</a>&nbsp; 
                                    <a href="doipass.php">Đổi pass</a>              
                                <?php }?>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- *** TOP END *** -->

            <!-- *** NAVBAR ***
    _________________________________________________________ -->

            <div class="navbar-affixed-top" data-spy="affix" data-offset-top="200">

                <div class="navbar navbar-default yamm" role="navigation" id="navbar">

                    <div class="container">
                        <div class="navbar-header">

                            <a class="navbar-brand home" href="index.php">
                                <img src="img/logo1.png" alt="Logo Shop" class="hidden-xs hidden-sm">
                                <img src="img/logo1.png" alt="Logo Shop" class="visible-xs visible-sm"><span class="sr-only">homepage</span>
                            </a>
                            <div class="navbar-buttons">
                                <button type="button" class="navbar-toggle btn-template-main" data-toggle="collapse" data-target="#navigation">
                                    <span class="sr-only">Toggle navigation</span>
                                    <i class="fa fa-align-justify"></i>
                                </button>
                            </div>
                        </div>
                        <!--/.navbar-header -->

                        <div class="navbar-collapse collapse" id="navigation">

                            <ul class="nav navbar-nav navbar-right">
                                <li class="use-yamm yamm-fw">
                                    <a href="<?=BASE_URL?>">Trang chủ</a>                                    
                                </li>
                                <li class="use-yamm yamm-fw">
                                    <a href="<?=BASE_URL?>dien-thoai/">Sản phẩm</a>                
                                </li>
                                <li class="use-yamm yamm-fw">
   									<a href="<?=BASE_URL?>lien-he/">Liên hệ</a>                
                                </li>
                                <li class="use-yamm yamm-fw">
                                   <a href="<?=BASE_URL?>gio-hang/">Giỏ Hàng</a>
                                </li>
                            </ul>

                        </div>
                        <!--/.nav-collapse -->



                        <div class="collapse clearfix" id="search">

                            <form class="navbar-form" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <span class="input-group-btn">

                    <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button>

                </span>
                                </div>
                            </form>

                        </div>
                        <!--/.nav-collapse -->

                    </div>


                </div>
                <!-- /#navbar -->

            </div>

            <!-- *** NAVBAR END *** -->

        </header>