<?php
$loi = array(); 
$loi_str="";
if (isset($_POST['mail'])){	
	if ($_POST['cap']!=$_SESSION['captcha_code']){
	  $loi['captcha'] = "<span class='label label-danger'>Ban nhập sai ma so trong hinh</span>";
	}else {
	
		  $thanhcong = $dt->DangKyThanhVien($loi);
		  if ($thanhcong==true) {
			echo "<script>document.location='dang-ky-thanh-cong/';</script>";
			exit();
		  }
		  else foreach($loi as $s) $loi_str = $loi_str . $s . "<br/>";
	}
}
?>

<div class="col-md-12">
<?php if ($loi_str!="") {?>
<div class="alert alert-danger">  <?=$loi_str?> </div>
<?php }?>

<form action="" method="post">

   <div class="form-group row">
     <div class="col-md-3"> <label for="mail">Email</label> </div>
     <div class="col-md-9"> 
     <input type="email" class="form-control" name="mail" id="mail" oninvalid="this.setCustomValidity('Bạn nhập email không đúng')" oninput="this.setCustomValidity('')" value="<?php if (isset($_POST['mail'])) echo $_POST['mail']; ?>">
     <span id="kiemtraEmail"></span>	
     </div>
   </div>
   <div class="form-group row">
     <div class="col-md-3"> <label for="pass">Mật khẩu</label> </div>
     <div class="col-md-9"> 
     <input type="password" class="form-control" name="pass" id="pass" pattern=".{6,30}" oninvalid="this.setCustomValidity('Mật khẩu từ 6 đến 30 ký tự nhé')" oninput="this.setCustomValidity('')" value="<?php if (isset($_POST['pass'])) echo $_POST['pass']; ?>">
     </div>
   </div>
   <div class="form-group row">
     <div class="col-md-3"><label for="repass">Gõ lại MK</label> </div>
     <div class="col-md-9"> 
     <input type="password" class="form-control" name=repass id=repass pattern=".{6,30}" oninvalid="this.setCustomValidity('Mật khẩu từ 6 đến 30 ký tự nhé')" oninput="this.setCustomValidity('')" value="<?php if (isset($_POST['repass'])) echo $_POST['repass']; ?>">
     </div>
   </div>
   <div class="form-group row">
     <div class="col-md-3"> <label for="ht">Họ tên</label> </div>
     <div class="col-md-9"> 
     <input class="form-control" name="ht" id="ht" required oninvalid="this.setCustomValidity('Nhập họ tên vô bạn ơi')" oninput="this.setCustomValidity('')" value="<?php if (isset($_POST['ht'])) echo $_POST['ht']; ?>">
     </div>
   </div>
   <div class="form-group row">
     <div class="col-md-3"> <label for="dc">Địa chỉ</label> </div>
     <div class="col-md-9"> 
     <input class="form-control" name="dc" id="dc" required oninvalid="this.setCustomValidity('Bạn ơi , địa chỉ sao không nhập vào')" oninput="this.setCustomValidity('')" value="<?php if (isset($_POST['dc'])) echo $_POST['dc']; ?>">
	 </div>
   </div>
   <div class="form-group row">
     <div class="col-md-3"> <label for="dt">Điện thoại</label> </div>
     <div class="col-md-9"> 
     <input type="tel" class="form-control" name="dt" id="dt" pattern="\d{10,10}" oninvalid="this.setCustomValidity('Nhập số di động 10 ký tự nhé')" oninput="this.setCustomValidity('')" value="<?php if (isset($_POST['dt'])) echo $_POST['dt']; ?>">	
     </div>
   </div>
   <div class="form-group row">
       <div class="col-md-3"> <img src="captcha.php" height="36"/> </div>
       <div class="col-sm-3">			  
         <input name="cap" class="form-control" >
         <?php if (isset($loi['captcha'])) echo $loi['captcha'];?>
       </div>
    </div>
   <div class="form-group row">
     <div class="col-md-3"> <label>Phái</label> </div>
     <div class="col-md-9"> 
     <input type="radio" name="phai" value="1"<?php if(isset($_POST['phai'])==1) echo 'checked'; ?>> Nam &nbsp;
     <input type="radio" name="phai" value="0"<?php if(isset($_POST['phai'])==0) echo 'checked'; ?>> Nữ
     </div>
   </div>
   <div class="form-group row text-center">
     <button type="submit" class="btn btn-template-main">
     <i class="fa fa-sign-in"></i> ĐĂNG KÝ
     </button>
   </div>
</form>
</div>

<script>
jQuery(function($) { 
$('#mail').blur(function() { 
		$.get(
             'checkemail.php' , 
              "mail=" + $(this).val()  , 
		     function (d){  $('#kiemtraEmail').html(d); }
		);//$.get
	}); 
})(jQuery);
</script>
