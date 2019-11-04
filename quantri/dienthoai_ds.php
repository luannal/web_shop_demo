<div class="header">
    <h2>
        DANH SÁCH SẢN PHẨM
    </h2>            
</div>
<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
    <thead>
        <tr>
            <th class="col-lg-1 col-md-1">Loại</th>           
            <th class="col-lg-2 col-md-2">Tên SẢn Phẩm</th>
            <th class="col-lg-4 col-md-5">Mô Tả</th>
            <th class="col-lg-1 col-md-2">Giá</th>
            <th class="col-lg-1 col-md-1">Ẩn Hiện</th>
            <th class="col-lg-1 col-md-1">Hot</th>
            <th class="col-lg-2 col-md-1">Cập nhật/Xóa</th> 
        </tr>
    </thead>
    <tbody>
        <?php $kq = $qt->ListSP(); ?>
        <?php while ($rowSP = $kq->fetch_assoc() ) { ?>
            <tr>
                <td><?=$rowSP['TenLoai']?></td>
                <td><?=$rowSP['TenDT']?></td>
                <td><p><?=$rowSP['MoTa']?></p></td>
                <td><?=number_format($rowSP['Gia'],0, ",",".");?></td>
                <td><?=($rowSP['AnHien']==1)?"Đang hiện":"Đang ẩn"?></td>
                <td><?=($rowSP['Hot']==1)?"Hot":"Thường"?></td>
                <td>
                    <a href="?p=dienthoai_sua&idDT=<?=$rowSP['idDT']?>" class="btn bg-blue waves-effect">Cập nhật</a> &nbsp;
                    <a href="dienthoai_xoa.php?idDT=<?=$rowSP['idDT']?>" class="btn bg-red waves-effect" onClick="return confirm('Xóa hả')">Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<!-- JQuery DataTable Css -->
<link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
<!-- JQuery DataTable Css -->
<link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
<!-- Jquery DataTable Plugin Js -->
<script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
<!-- Custom Js -->
<script src="js/pages/tables/jquery-datatable.js"></script>
