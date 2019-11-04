<div class="header">
    <h2>
        DANH SÁCH LOẠI 
    </h2>            
</div>
<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
    <thead>
        <tr>  
            <th>idLoai</th>
            <th>Tên Loại</th>
            <th>Thứ Tự</th>
            <th>ẩn Hiện</th>
            <th>Cập nhật/Xóa</th> 
        </tr>
    </thead>
    <tbody>
        <?php $kq = $qt->ListLoaiSP(); ?>
        <?php while ($rowLoai = $kq->fetch_assoc() ) { ?>
            <tr> 
                <td><?=$rowLoai['idLoai']?></td>
                <td><?=$rowLoai['TenLoai']?></td>
                <td><?=$rowLoai['ThuTu']?></td>
                <td><?=$rowLoai['AnHien']?></td> 
                <td>
                    <a href="?p=loaisp_sua&idLoai=<?=$rowLoai['idLoai']?>" class="btn bg-blue waves-effect">Cập nhật</a> &nbsp;
                    <a href="loaisp_xoa.php?idLoai=<?=$rowLoai['idLoai']?>" class="btn bg-red waves-effect" onClick="return confirm('Xóa hả')">Xóa</a>
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
