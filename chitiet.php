<?php
$tenDT=$_GET['TenDT'];
$idDT=$dt-> LayidDT($tenDT);
$ct = $dt-> chiTietSP($idDT);
$rowCT = $ct->fetch_assoc(); 
?>
<style>
h1.lead {color: #38a7bb; font-weight:900; text-transform:uppercase; font-size:26px}
p.goToDescription { margin-top:30px; text-align:left;}
#mainImage {margin-top:50px}
#mainImage img {height:250px; }
#productMain #thumbs img {height:80px}
#productMain #thumbs div {text-align:center}
#productMain #thumbs a {border:none;}
</style>
<div class="container">

                <div class="row">

                    <!-- *** LEFT COLUMN ***
		    _________________________________________________________ -->

                    <div class="col-md-12">

                        <p class="lead"><?=$rowCT['MoTa']?></p>
                        <p class="goToDescription"><a href="#details" class="scroll-to text-uppercase">Cuộn để xem chi tiết sản phẩm</a>
                        </p>

                        <div class="row" id="productMain">
                            <div class="col-sm-6">
                                <div id="mainImage">
                                    <img src="upload/hinhchinh/<?=$rowCT['urlHinh']?>" alt="" class="img-responsive">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="box">

                                    <form>                                

                                        <p class="price"><?=number_format($rowCT['Gia'],0, ",",".");?> VND</p>

                                        <p class="text-center">               
                                            <a href="capnhatGH.php?action=add&idDT=<?=$idDT?>" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>                                                                                    
                                        </p>

                                    </form>
                                </div>
                                <div class="row" id="thumbs">
								   <?php $lispHinh = $dt->layHinhSP($idDT,4);?>
                                   <?php if ($lispHinh->num_rows>0) {?>
                                   <?php while($rowH = $lispHinh ->fetch_assoc()) {?>
                                    <div class="col-xs-3">
                                    <a href="upload/hinhphu/<?=$rowH['urlHinh']?>" class="thumb">
                                    <img src="upload/hinhphu/<?=$rowH['urlHinh']?>" class="img-responsive">
                                     </a>
                                     </div>
                                	<?php } }?>
                                </div>
                            </div>
                        </div>

                        <div class="box" id="details">                            
                             <h4>Giới thiệu</h4>
                             <div id="gioithieu"><?=$rowCT['baiviet']?></div>                               
                        </div>

                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <div class="box text-uppercase">
                                    <h3>Bạn Có Thể Thích</h3>
                                </div>
                            </div>

                            <?php
                            $TenLoai = $dt->LayTenLoai($rowCT['idLoai']);	  
                            $pageNum = $_GET['pageNum'];  settype($pageNum, "int"); 
                            if ($pageNum<=0) $pageNum=1;
                            $listSP = $dt-> SanPhamTrongLoai($TenLoai,$pageNum, 3,$totalRows );
                            ?>
                            <?php while ($row = $listSP->fetch_assoc() ) {?>
                            <div class="col-md-3 col-sm-6">
                                <div class="product">
                                    <div class="image">
                                        <a href="<?=BASE_URL."dien-thoai/".$row['TenDT']?>.html">
                                            <img src="<?=BASE_URL."upload/hinhchinh/".$row['urlHinh']?>" alt="" class="img-responsive image1">
                                        </a>
                                    </div>
                                    <div class="text">
                                        <h3><?=$row['TenDT']?></h3>
                                        <p class="price"><?=number_format($row['Gia'],0, ",",".");?> VND</p>

                                    </div>
                                </div>
                                <!-- /.product -->
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- /.col-md-9 -->


                    <!-- *** LEFT COLUMN END *** -->

                    <!-- *** RIGHT COLUMN ***
		  _________________________________________________________ -->

                    <!-- /.col-md-3 -->

                    <!-- *** RIGHT COLUMN END *** -->

                </div>
                <!-- /.row -->

            </div>