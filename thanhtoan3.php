<?php
if (isset($_POST['delivery'])) 
   $_SESSION['DonHang']['delivery']=$_POST['delivery'];
//print_r($_SESSION);
?>

<div class="container">

                <div class="row">

                    <div class="col-md-12 clearfix" id="checkout">

                        <div class="box">
                            <form method="post" action="thanh-toan-4/">
                                <ul class="nav nav-pills nav-justified">
									<li class="disabled"><a href="#"><i class="fa fa-map-marker"></i><br>Địa chỉ</a></li>
									<li class="disabled"><a href="#"><i class="fa fa-truck"></i><br>Phương thức giao hàng</a></li>
									<li class="active"><a href="#"><i class="fa fa-money"></i><br>Phương thức thanh toán</a></li>
									<li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Thông tin đơn hàng</a></li>
								</ul>

                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="box payment-method">

                                                <h4>Chuyển khoản</h4>

                                                <p>Quý khách thanh toán bằng chuyển khoản.</p>

                                                <div class="box-footer text-center">

                                                    <input type="radio" name="payment" value="chuyenkhoan" <?php if($_SESSION['DonHang']['payment']=='chuyenkhoan') echo 'checked';?>>Chuyển vào tài khoản 012 345 678 (Vietcombank)
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="box payment-method">

                                                <h4>THANH TOÁN KHI GIAO HÀNG</h4>

                                                <p>Quý khách trả tiền khi nhận hàng tại nhà.</p>

                                                <div class="box-footer text-center">

                                                    <input type="radio" name="payment" value="payment" <?php if($_SESSION['DonHang']['payment']=='payment') echo 'checked';?>>
													An toàn nhất.
                                                </div>
                                            </div>
                                        </div>
									</div>
                                    <!-- /.row -->

                                </div>
                                <!-- /.content -->

                                <div class="box-footer">
                                    <div class="pull-left">
                                        <a href="thanh-toan-2/" class="btn btn-default"><i class="fa fa-chevron-left"></i>Trở lại</a>
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-template-main">Qua bước kế<i class="fa fa-chevron-right"></i>
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