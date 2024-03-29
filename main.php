<?php session_start();
      require_once "class/dt.php";
      $dt = new dt;
	  $p = $_GET['p'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Shop bán điện thoại di động</title>
    <base href="<?=BASE_URL?>"/>
	<script
	  src="https://code.jquery.com/jquery-3.1.1.js"
	  integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
	  crossorigin="anonymous"></script>
    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800' rel='stylesheet' type='text/css'>

    <!-- Bootstrap and Font Awesome css -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Css animations  -->
    <link href="css/animate.css" rel="stylesheet">

    <!-- Theme stylesheet, if possible do not edit this stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- Responsivity for older IE -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

    <!-- Favicon and apple touch icons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="img/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="img/apple-touch-icon-152x152.png" />
</head>

<body>

    <div id="all">

        <?php require "header.php"?>

        <!-- *** LOGIN MODAL ***
_________________________________________________________ -->

        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="customer-orders.html" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="email_modal" placeholder="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password_modal" placeholder="password">
                            </div>

                            <p class="text-center">
                                <button class="btn btn-template-main"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>

                        </form>

                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="customer-register.html"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                    </div>
                </div>
            </div>
        </div>

        <!-- *** LOGIN MODAL END *** -->

        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                <?php if($p=="") $link= 'Sản Phẩm'?>
                <?php if($p=="lienhe") $link= 'Liên Hệ'?>
                <?php if($p=="giohang") $link= 'Giỏ Hàng'?>
                <?php if($p=="tin") $link= 'Tin'?>
                <?php if($p=="login") $link= 'Đăng Nhập'?>
                <?php if($p=="dangky") $link= 'Đăng Ký'?>
                    <div class="col-md-7">
                        <h1>DANH MỤC SẢN PHẨM</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="index.html">Trang chủ</a>
                            </li>
                            <li><?= $link ?></li>
                        </ul>
                    </div>
                 
                </div>
            </div>
        </div>

        <div id="content">
            <div class="container">
            <?php 
				if ($p=="giohang") require "giohang.php";
                elseif ($p=="login") require "login.php";
                elseif ($p=="guipasstc") require "guipasstc.php";
                elseif ($p=="guipass") require "guipass.php";
				elseif ($p=="dangky") require "dangky.php";
  				elseif ($p=="dangkytc") require "dangkytc.php";
				elseif ($p=="lienhe") require "lienhe.php";
				elseif ($p=="chitiet") require "chitiet.php";
				elseif ($p=="sptrongloai") require "sptrongloai.php";
		  		elseif ($p=="dathang") require "dathang.php";
				elseif ($p=="thanhtoan1") require "thanhtoan1.php";
				elseif ($p=="thanhtoan2") require "thanhtoan2.php";
				elseif ($p=="thanhtoan3") require "thanhtoan3.php";
                elseif ($p=="thanhtoan4") require "thanhtoan4.php";
                elseif ($p=="tin") require "blogchitiet.php";
				else { ?>
                   <div class="heading"> <h2>SẢN PHẨM MỚI</h2>	</div>
                     <?php $listSP = $dt-> SanPhamMoi(18); include "listsp.php"; ?>            
                    <div class="heading"> <h2>SẢN PHẨM BÁN CHẠY</h2> </div>
                    <?php $listSP = $dt-> SanPhamBanChay(18); include "listsp.php"?>				
                    <div class="heading"> <h2>SẢN PHẨM HOT</h2> </div>
                    <?php $listSP = $dt-> SanPhamHot(18); include "listsp.php"?>
                <?php } ?>
            </div>

            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** GET IT ***
_________________________________________________________ -->


        <!-- *** GET IT END *** -->


        <!-- *** FOOTER ***
_________________________________________________________ -->

        <?php require "footer.php";?>
        <!-- /#footer -->

        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT ***
_________________________________________________________ -->

        <!-- /#copyright -->

        <!-- *** COPYRIGHT END *** -->



    </div>
    <!-- /#all -->


    <!-- #### JAVASCRIPT FILES ### -->

    
    
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.parallax-1.1.3.js"></script>
    <script src="js/front.js"></script>

    



</body>

</html>