﻿<?php  
session_start();
require_once "../class/quantrishop.php";
$qt = new quantrishop;
if ($_POST) {
   $u = trim($_POST['username']); 
   $p = trim($_POST['password']);
   $kq = $qt-> thongtinuser($u, $p);
   if ($kq) {//Thành công				
      $_SESSION['login_id'] = $kq['idUser'];
      $_SESSION['login_user'] = $kq['Username'];
      $_SESSION['login_level'] = $kq['idGroup'];
      $_SESSION['login_hoten'] = $kq['HoTen'];
      $_SESSION['login_email'] = $kq['Email'];
      if ( strlen($_SESSION['back']) > 0 ){
         $back= $_SESSION['back']; 
         unset($_SESSION['back']);
         header("location:$back");	    
      } else header("location: index.php");
   } else header("location: login.php");	//Thất bại
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>QUẢN LÍ SẢN PHẨM</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">ĐĂNG NHẬP</a>
            <small>Quản Lí Sản Phẩm Điện Thoại</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">Đăng nhập vào trang quản lí</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">                       
                        <div class="col-xs-4" style="left:35%;">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">Đăng Nhập</button>
                        </div>
                    </div>                 
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>