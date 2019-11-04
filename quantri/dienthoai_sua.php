<?php
$row=null;
$idDT = $_GET['idDT']; settype($idDT,"int");
$kq = $qt->SP_ChiTiet($idDT);
if ($kq) $row = $kq->fetch_assoc();

if (isset($_POST['TenDT'])){ 
   $TenDT = $_POST['TenDT'];
   $MoTa = $_POST['MoTa'];
   $Gia = $_POST['Gia'];
   $GiaKM = $_POST['GiaKM'];
   $baiviet = $_POST['baiviet'];
   $urlHinh = $_POST['urlHinh'];   
   $AnHien = $_POST['AnHien'];
   $Hot = $_POST['Hot'];
   $NgayCapNhat = $_POST['NgayCapNhat'];
   $idLoai = $_POST['idLoai'];
   $qt->SP_Sua($TenDT, $MoTa, $Gia, $GiaKM, $baiviet, $urlHinh, $AnHien, $Hot,  $NgayCapNhat, $idLoai, $idDT);
   echo "<script>document.location='index.php?p=dienthoai_ds';</script>";
   exit();
}
?>

<?php $listSP= $qt->ListLoaiSP();?>

<style>
.form-group {margin-bottom:15px;}
.form-group .form-line {border-bottom:none}
.form-group .form-control {padding:3px; border:1px solid #999;}
.form-group .form-line.abc {padding-top:5px;}
.form-group .form-control{ background: #337ab7; 
  border-radius: 6px; color:yellow; font-size:14px;letter-spacing:1px}
.form-group .form-control::placeholder {color:white}
#form_validation .col-md-4  {margin-bottom:0px;}
</style>

<div class="row clearfix">
    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12" style="margin:auto; float:none">
        <div class="card">
            <div class="header">
                <h2>THÊM SẢN PHẨM</h2>              
            </div>
            <div class="body">
                <form id="form_validation" method="POST">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="TenDT" required maxlength="100" minlength="10"  placeholder="Tên Điện Thoại" value="<?=$row['TenDT']?>">                         
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea name="MoTa" cols="30" rows="5" class="form-control no-resize" placeholder="Mô Tả"><?=$row['MoTa']?></textarea>                           
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="Gia" id="Gia" placeholder="Giá" value="<?=$row['Gia']?>">                           
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" id="KM" placeholder="% Giảm" min="0" style="width:200px; display:inline;"> %
                            <input type="number" class="form-control" id="GiaKM" name="GiaKM" style="width:600px; float:right;" placeholder="Giá Khuyến Mãi" value="<?=$row['GiaKM']?>" readonly>                            
                        </div>
                    </div>
                    <div class="form-group form-float"> 
                        <div class="form-line">
                            <input type="text" name="urlHinh" id="urlHinh" class="form-control" onclick="selectFileWithCKFinder('urlHinh')" placeholder="Địa chỉ hình của bài viết" value="<?=$row['urlHinh']?>">
                        </div> 
                    </div>
                    <div class="row cleafix">
                        <div class="col-md-4">
                            <div class="form-group form-float">
                                <input type="radio" name="AnHien" id="AH0" value="0" <?=($row['AnHien']==0)?"checked":""?>>
                                <label for="AH0">Ẩn</label>
                                <input type="radio" name="AnHien" id="AH1" value="1" <?=($row['AnHien']==1)?"checked":""?>>
                                <label for="AH1" class="m-l-20">Hiện</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-float">
                                <input type="radio" name="Hot" id="HOT0" value="0" <?=($row['Hot']==0)?"checked":""?>>
                                <label for="HOT0">Thường</label>
                                <input type="radio" name="Hot" id="HOT1" value="1" <?=($row['Hot']==1)?"checked":""?>>
                                <label for="HOT1" class="m-l-20">Hot</label>
                            </div>
                        </div>                    
                    </div>
                    <div class="row cleafix" style="width:100pxl float:left; display:inline;">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-line">
                                <?php $listSP= $qt->ListLoaiSP();?>
                                <select class="form-control show-tick" name="idLoai" id="idLoai">
                                    <option value="0">-- Chọn Loại SP --</option>
                                    <?php while ($r = $listSP->fetch_assoc()) { ?>
                                        <?php if( $r['idLoai'] == $row['idLoai']) { ?>
                                        <option value="<?=$r['idLoai']?>" selected><?=$r['TenLoai']?></option>
                                        <?php } else { ?>
                                        <option value="<?=$r['idLoai']?>"><?=$r['TenLoai']?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div> 
                        </div>
                                
                    </div>
                    <div class="row cleafix">                       
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="datepicker form-control" name="NgayCapNhat" placeholder="Ngày Đăng" style="width:500px;" value="<?=date('d/m/Y',strtotime($row['NgayCapNhat']))?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-float" style="clearfix:both;">
                        <div class="form-line">
                            <textarea name="baiviet" cols="30" rows="5" class="form-control no-resize" placeholder="Bài Viết"><?=$row['baiviet']?></textarea>                           
                        </div>
                    </div>                                                    
                    
                <button class="btn btn-primary waves-effect" type="submit">THÊM SP</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(e) {   
	$("#KM").change(function(){
		var KM=$("#KM").val();
		var Gia=$("#Gia").val();
        return $("#GiaKM").val(Gia-(Gia*KM/100));
	});
});
</script>

<script src="plugins/ckeditor/ckeditor.js"></script> <!--Có thể chèn trực tiếp từ net-->
<script>
$(document).ready(function(e) {        
    CKEDITOR.replace('baiviet',{language:'vi', skin:'kama'});
    CKEDITOR.config.height = 300;   
});
</script>

<link href="plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
<script src="plugins/autosize/autosize.js"></script>
<script src="plugins/momentjs/moment.js"></script>
<script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
<script>
$(document).ready(function(e) {   
    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'D/M/Y', 
        weekStart: 1, time: false
    });	
});
</script>

<script src=" plugins/ckfinder/ckfinder.js"></script>

<script>
$(document).ready(function(e) {
	$("#form_validation").submit(function(){
		  if ($("#idLoai").val()==0) {
			 alert("Bạn ơi! Chưa chọn loại sp mà.");return false;
		  }
	}); 
});
</script>

<script>
    var tf1 = document.getElementById( 'urlHinh' );
      tf1.onclick = function(){
        selectFileWithCKFinder( 'urlHinh' );
      };
      
      function selectFileWithCKFinder( elementId ){
        CKFinder.popup({
          chooseFiles: true,
          width: 800,	height: 600,
          onInit: function( finder ) {
            finder.on( 'files:choose', function( evt ) {
              var file = evt.data.files.first();
              var output = document.getElementById( elementId );
              output.value = file.getUrl();
            } );

            finder.on( 'file:choose:resizedImage', function( evt ) {
              var output = document.getElementById( elementId );
              output.value = evt.data.resizedUrl;
            } );
          }
        });
      }
</script>