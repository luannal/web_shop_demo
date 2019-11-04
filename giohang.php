<div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <p class="text-muted lead">Giỏ hàng hiện có xxx sản phẩm</p>
                    </div>


                    <div class="col-md-9 clearfix" id="basket">

                        <div class="box">

                            <form method="post" action="capnhatGH.php?action=update">

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan= "2">Tên SP</th>
                                                <th>Số lượng</th>
                                                <th>Giá</th>
                                                <th>Giảm</th>
                                                <th colspan= "2">Tổng tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
											   reset( $_SESSION['daySoLuong'] );
											   reset( $_SESSION['dayDonGia'] );
											   reset( $_SESSION['dayTenDT'] );
											   reset( $_SESSION['dayHinh'] );
											   $tongtien = $tongsoluong = 0;	
											?>
											<?php for ($i = 0; $i< count( $_SESSION['daySoLuong']) ; $i++) { ?>
											<?php
											   $idDT = key( $_SESSION['daySoLuong'] );
											   $tendt = current( $_SESSION['dayTenDT'] );
											   $soluong = current( $_SESSION['daySoLuong'] );
											   $dongia = current( $_SESSION['dayDonGia'] );
											   $hinh= current( $_SESSION['dayHinh'] );
											   $tiengiam = 0;
											   $tien = $dongia*$soluong-$tiengiam;
											   $tongtien+= $tien; 
											   $tongsoluong+= $soluong;
                                            ?>
                                            
                                            <tr>
                                                <td>
                                                    <a href="<?=BASE_URL."dien-thoai/".$tendt?>.html">
                                                        <img src="upload/hinhchinh/<?=$hinh?>" alt="<?=$tendt?>">
                                                    </a>
                                                </td>
                                                <td><a href="<?=BASE_URL."dien-thoai/".$tendt?>.html"><?=$tendt?></a>
                                                </td>
                                                <td>
                                                    
                                                    <input type="number" value="<?=$soluong?>" class="form-control" name="soluong_arr[]" >
                                                    <input type="hidden" value="<?=$idDT?>" name="iddt_arr[]">
                                               
                                               
                                                </td>
                                                <td><?=number_format($dongia,0, ",",".");?> VND</td>
                                                <td><?=number_format($tiengiam,0, ",",".");?> VND</td>
                                                <td><?=number_format($tien,0, ",",".");?> VND</td>
                                                <td><a href="capnhatGH.php?action=remove&idDT=<?=$idDT?>"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <?php 
											   next( $_SESSION['daySoLuong'] );  
											   next( $_SESSION['dayDonGia'] );
											   next( $_SESSION['dayTenDT'] );
											   next( $_SESSION['dayHinh'] );
											?>
											<?php } //for ?>                                        
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="2">Tổng Cộng</th>
                                                <th colspan="3" style="padding:5px 0px 0px 30px;"><?=$tongsoluong?></th>
                                                <th colspan="2" ><?=number_format($tongtien,0, ",",".");?> VND</th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>
                                <!-- /.table-responsive -->

                                <div class="box-footer">
                                    <div class="pull-left">
                                        <a href="<?=BASE_URL?>dien-thoai/" class="btn btn-default"><i class="fa fa-chevron-left"></i>Tiếp tục mua hàng</a>
                                    </div>
                                    <div class="pull-right">
                                        <button class="btn btn-default"><i class="fa fa-refresh"></i>Cập nhật giỏ hàng</button>
                                       <a class="btn btn-template-main" href="<?=BASE_URL?>thanh-toan-1/">Thanh toán <i class="fa fa-chevron-right"></i></a>
                                       
                                    </div>
                                </div>

                            </form>

                        </div>
                        <!-- /.box -->

                    </div>
                    <!-- /.col-md-9 -->

                    <div class="col-md-3">
                        <div class="box" id="order-summary">
                            <div class="box-header">
                                <h3>Đơn hàng</h3>
                            </div>
                            <p class="text-muted">Thông tin đơn hàng hiện tại của bạn</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Tiền mua hàng</td>
                                            <th><?=number_format($tongtien,0, ",",".");?> VND</th>
                                        </tr>
                                        <tr>
                                            <td>Phí chuyển hàng</td>
                                            <th><?=number_format($tienship=30000,0, ",",".");?> VND</th>
                                        </tr>
                                        <tr>
                                            <td>Thuế</td>
                                            <th><?=number_format($thue=($tongtien*10/100),0, ",",".");?> VND</th>
                                        </tr>
                                        <tr class="total">
                                            <td>Tổng tiền thanh toán</td>
                                            <th><?=number_format($tongthanhtoan=($tongtien+$tienship+$thue),0, ",",".");?> VND</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                </div>

            </div>
