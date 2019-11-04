<?php
$loi = array(); 
$loi_str="";
if (isset($_POST['email'])){	
      $thanhcong = $dt->GuiPass($loi);
      if ($thanhcong==true) {
        echo "<script>document.location='main.php?p=guipasstc';</script>";
        exit();
      }
      else foreach($loi as $s) $loi_str = $loi_str . $s . "<br/>";
}
?>

			<div class="heading">
			    <h3>Xác nhận Email để nhận lại Mật Khẩu</h3>
			</div>
			<form method="post">
				<div class="row">					
						<div class="form-group" style="width: 500px;">
			                <label for="email">Email</label>
			                <input type="text" class="form-control" name="email" id="email" value="<?php if (isset($_POST['email']) ) echo $_POST['email']?>">			            
						</div>
					
						<div class="form-group">
			                    <button type="submit" name="submit" class="btn btn-template-main" value="GỬI"><i class="fa fa-envelope-o"></i>GỬI</button>
						</div>
					
				</div>
			</form>
