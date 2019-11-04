
<div class="container" id="contact">

                <section>
                    <div class="row">
                        <div class="col-md-8">

                            <div class="heading">
                                <h2>Chúng tôi ở đây để phục vụ bạn</h2>
                            </div>

                            <p class="lead">Bạn có điều gì chưa rõ không? Bạn có cần tư vấn về cách sử dụng điện thoại không? Bạn có cần tìm hiểu một vài tính năng mới không? Bạn có đang cần mua một điện thoại mới? Mọi vấn đề về điện thoại mà bạn muốn biết… xin hãy đến với chúng tôi.</p>
                            <p>Vui lòng điền thông tin trong mẫu dưới để liên hệ với chúng tôi (24/24)</p>

                            <div class="heading">
                                <h3>Liên hệ với chúng tôi</h3>
                            </div>
<?php 
if (isset($_POST['name']) ==true){
	$ht=htmlentities(trim(strip_tags($_POST['name'])),ENT_QUOTES,'utf-8');
	$m=htmlentities(trim(strip_tags($_POST['email'])),ENT_QUOTES,'utf-8');
	$td=htmlentities(trim(strip_tags($_POST['subject'])),ENT_QUOTES,'utf-8');
	$nd=htmlentities(trim(strip_tags($_POST['message'])),ENT_QUOTES,'utf-8');
	$nd= nl2br($nd);
	$loi="";
	$cap = $_POST['cap'];
	if ($cap!= $_SESSION['captcha_code']) $loi.="Bạn nhập chữ không đúng với hình<br>";
	if ($ht=="") $loi.="Bạn chưa nhập họ tên<br>";
	if ($m=="") $loi.="Bạn chưa nhập email<br>";
	if ($td=="") $loi.="Bạn chưa nhập tiêu đề<br>";
	if ($nd=="") $loi.="Bạn chưa nhập nội dung liên hệ<br>";
	else if (strlen($nd)<=10) $loi.="Nội dung liên hệ quá ngắn<br>";
	if ($loi==""){
	   $to ="anhluan.nal@gmail.com"; 
	   $from="anh.luan.saigon123@gmail.com";
	   $pass="anhluan123";
	   $topText="Họ tên: {$ht}<br>Email: {$m}<br>Tiêu đề: {$td}" ;
	   $nd = $topText."<br>Nội dung:<hr>".$nd;		
	   $error="";
	   $dt->GuiMail($to, $from,$from_name="BQT",$td,$nd,$from,$pass,$error);
	   if ($error!="") $loi=$error;
	   else {
		   $_SESSION['camon'] ="Cảm ơn bạn. Ý kiến đã được ghi nhận";
		   echo "<script>document.location='/banhang/lien-he/';</script>";
		   exit();
	   }
	}
}
?>
<div id="thongbaoLH" style="background:#ccc;color:red; padding:20px; text-align:center;line-height:150%; margin-top:10px">
	<?php 
        if ($loi!="") echo $loi;
        if (isset($_SESSION['camon'])==true) {
            echo $_SESSION['camon'] ; unset($_SESSION['camon']); };
    ?>
</div>
<?php if (isset($_SESSION['camon'])==false) {?>

                            <form method="post">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="firstname">Họ tên</label>
                                            <input type="text" class="form-control" name="name" id="firstname" value="<?php if (isset($_POST['name']) ) echo $_POST['name']?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" name="email" id="email" value="<?php if (isset($_POST['email']) ) echo $_POST['email']?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="subject">Tiêu đề</label>
                                            <input type="text" class="form-control" name="subject" id="subject" value="<?php if (isset($_POST['subject']) ) echo $_POST['subject']?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="message">Nội dung liên hệ</label>
                                            <textarea id="message" class="form-control" name="message" style="height:150px"><?php if (isset($_POST['message']) ) echo $_POST['message']?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
										<div class="form-group">
                                     <img src="<?=BASE_URL?>captcha.php" align="left" height="46"> &nbsp; 
                                     <input class="text_input" name="cap" placeholder="Nhập chữ trong hình" value="<?php if (isset($_POST['cap']) ) echo $_POST['cap']?>" >
										</div>
                                    </div>
                                    <div class="col-sm-6 text-center">
                                        <button type="submit" name="submit" class="btn btn-template-main" value="GỬI LIÊN HỆ"><i class="fa fa-envelope-o"></i>GỬI LIÊN HỆ</button>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </form>
<?php } ?>                            
                        </div>

                        <div class="col-md-4">


                            <h3 class="text-uppercase">Địa chỉ</h3>

                            <p>13/25 ABC
                                <br>XYZ
                                <br>45Y 73J
                                <br>Sài Gòn
                                <br>
                                <strong>Việt Nam</strong>
                            </p>

                            <h3 class="text-uppercase">Số Điện Thoại</h3>

                            <p class="text-muted">Liên hệ qua số điện thoại.</p>
                            <p><strong>+33 555 444 333</strong>
                            </p>



                            <h3 class="text-uppercase">Email</h3>

                            <p class="text-muted">Liên hệ qua email.</p>
                            <p><strong>abc@gmail.com</strong>
                            


                        </div>

                    </div>


                </section>

            </div>