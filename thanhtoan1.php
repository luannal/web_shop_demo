<div class="container">

                <div class="row">

                    <div class="col-md-12 clearfix" id="checkout">

                        <div class="box">
                            <form method="post" action="thanh-toan-2/">

                                <ul class="nav nav-pills nav-justified">
                                    <li class="active"><a href="#"><i class="fa fa-map-marker"></i><br>Địa chỉ</a>
                                    </li>
                                    <li class="disabled"><a href="#"><i class="fa fa-truck"></i><br>Phương thức giao hàng</a>
                                    </li>
                                    <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Phương thức thanh toán</a>
                                    </li>
                                    <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Thông tin đơn hàng</a>
                                    </li>
                                </ul>

                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="firstname">Họ tên</label>
                                                <input type="text" value="<?PHP if(isset($_SESSION['DonHang']['hoten'])) echo $_SESSION['DonHang']['hoten'];?>" class="form-control" id="hoten" name="hoten" required oninvalid="this.setCustomValidity('Mời bạn nhập họ tên');" oninput="this.setCustomValidity('');">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="lastname">Địa chỉ</label>
                                                <input type="text" value="<?PHP if(isset($_SESSION['DonHang']['diachi'])) echo $_SESSION['DonHang']['diachi'];?>" class="form-control" id="diachi" name="diachi" required oninvalid="this.setCustomValidity('Bạn cho biết địa chỉ nhé');" oninput="this.setCustomValidity('');" >
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="company">Điện thoại</label>
                                                <input type="text" value="<?PHP if(isset($_SESSION['DonHang']['dienthoai'])) echo $_SESSION['DonHang']['dienthoai'];?>" class="form-control" id="dienthoai" name="dienthoai" required oninvalid="this.setCustomValidity('Bạn ơi số điện thoại của bạn chưa có.');" oninput="this.setCustomValidity('');">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="street">Email</label>
                                                <input type="text" value="<?PHP if(isset($_SESSION['DonHang']['email'])) echo $_SESSION['DonHang']['email'];?>" class="form-control" id="email" name="email" required oninvalid="this.setCustomValidity('Bạn thân mến! Còn email nữa');" oninput="this.setCustomValidity('');" >
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>

                                <div class="box-footer">
                                    <div class="pull-left">
                                        <a href="<?=BASE_URL?>/gio-hang/" class="btn btn-default"><i class="fa fa-chevron-left"></i>Xem lại giỏ hàng</a>
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