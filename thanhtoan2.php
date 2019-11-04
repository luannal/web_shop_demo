<?php //tiếp nhận từ bước 1
if (isset($_POST['hoten'])) 
   $_SESSION['DonHang']['hoten']=$_POST['hoten'];
if (isset($_POST['diachi'])) 
   $_SESSION['DonHang']['diachi']=$_POST['diachi'];
if (isset($_POST['dienthoai'])) 
   $_SESSION['DonHang']['dienthoai']=$_POST['dienthoai'];
if (isset($_POST['email'])) 
   $_SESSION['DonHang']['email']=$_POST['email'];
//print_r($_SESSION);
?>

<div class="container">

                <div class="row">

                    <div class="col-md-12 clearfix" id="checkout">

                        <div class="box">
                            <form method="post" action="thanh-toan-3/">
                                <ul class="nav nav-pills nav-justified">
									<li class="disabled"><a href="#"><i class="fa fa-map-marker"></i><br>Địa chỉ</a></li>
									<li class="active"><a href="#"><i class="fa fa-truck"></i><br>Phương thức giao hàng</a></li>
									<li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Phương thức thanh toán</a></li>
									<li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Thông tin đơn hàng</a></li>
								</ul>

                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="box shipping-method">

                                                <h4>GIAO TẬN NHÀ</h4>

                                                <p>Nội thành TPHCM - miễn phí. Nơi khác – 10000</p>

                                                <div class="box-footer text-center">

                                                    <input type="radio" name="delivery" value="giaotannha" <?php if($_SESSION['DonHang']['delivery']=='giaotannha') echo 'checked';?>>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="box shipping-method">

                                                <h4>CHUYỂN PHÁT NHANH EMS</h4>

                                                <p>Phí giao hàng 15000 VNĐ. TPHCM -2 ngày. Nơi khác tối đa 3 ngày.</p>

                                                <div class="box-footer text-center">

                                                    <input type="radio" name="delivery" value="chuyenphatnhanh" <?php if($_SESSION['DonHang']['delivery']=='chuyenphatnhanh') echo 'checked';?>>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="box shipping-method">

                                                <h4>CHUYỂN PHÁT THƯỜNG QUA BƯU ĐIỆN</h4>

                                                <p>Phí 5000 VNĐ. Tối đa 7 ngày.</p>

                                                <div class="box-footer text-center">

                                                    <input type="radio" name="delivery" value="buudien" <?php if($_SESSION['DonHang']['delivery']=='buudien') echo 'checked';?>>
                                                </div>
                                            </div>
                                        </div>
										
										<div class="col-sm-6">
											 <div class="box shipping-method">
												 <h4>HỎA TỐC</h4>
												 <p>Phí 25000 VNĐ. Giao hàng trong 1 ngày.</p>
												 <div class="box-footer text-center">
												 <input type="radio" name="delivery" value="hoatoc" <?php if($_SESSION['DonHang']['delivery']=='hoatoc') echo 'checked';?>>
												 </div>
											 </div>
										</div>
                                    </div>
                                    <!-- /.row -->

                                </div>
                                <!-- /.content -->

                                <div class="box-footer">
                                    <div class="pull-left">
                                        <a href="thanh-toan-1/" class="btn btn-default"><i class="fa fa-chevron-left"></i>Trở lại</a>
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-template-main">Qua bước kế tiếp<i class="fa fa-chevron-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->


                    </div>
                    <!-- /.col-md-9 -->

                    <!-- /.col-md-3 -->

                </div>
                <!-- /.row -->

            </div>