<?php
$row=null;
$idLoai = $_GET['idLoai']; settype($idLoai,"int");
$kq = $qt->LoaiSP_ChiTiet($idLoai);
if ($kq) $row = $kq->fetch_assoc();


if (isset($_POST['TenLoai'])){ 
    $TenLoai = $_POST['TenLoai'];
    $Hinh = $_POST['Hinh'];
    $ThuTu = $_POST['ThuTu'];
    $AnHien = $_POST['AnHien'];
    $qt->LoaiSP_Sua($idLoai,$TenLoai, $Hinh, $ThuTu,$AnHien);
    echo "<script>document.location='index.php?p=loai_sp';</script>";
    exit();
}
?>
<div class="row clearfix">
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 center-block" style="float:none">
                    <div class="card">
                        <div class="header">
                            <h2>
                                SỬA LOẠI SẢN PHẨM
                            </h2>                       
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="TenLoai">Tên Loại</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="TenLoai" name="TenLoai" class="form-control" 
                                                placeholder="Nhập tên loại sản phẩm"  maxlength="20" minlength="1" required value="<?=$row['TenLoai']?>" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="Hinh">Hinh</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="Hinh" name="Hinh" class="form-control" 
                                                placeholder="Hình Loại Sản Phẩm" onclick="selectFileWithCKFinder('Hinh')" value="<?=$row['Hinh']?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="ThuTu">Thứ tự</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="ThuTu" name="ThuTu" class="form-control" 
                                        placeholder="Nhập thứ tự xuất hiện" required min="1" max="1000" value="<?=$row['ThuTu']?>">
                                    </div>
                                </div>
                                </div>
                                </div>

                                <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label>Ẩn hiện</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="radio" id="AnHien_1" name="AnHien" value="1" <?=($row['AnHien']==1)?"checked":""?>> <label for="AnHien_1">Hiện</label>
                                        <input type="radio" id="AnHien_0" name="AnHien" value="0"<?=($row['AnHien']==0)?"checked":""?>>
                                        <label for="AnHien_0">Ẩn</label></div>
                                    </div>
                                </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">CẬP NHẬT</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

<script src=" plugins/ckfinder/ckfinder.js"></script>
<script>
    var tf1 = document.getElementById( 'Hinh' );
      tf1.onclick = function(){
        selectFileWithCKFinder( 'Hinh' );
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