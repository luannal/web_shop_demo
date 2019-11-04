<?php
require "../class/goc.php";
class quantrishop extends goc  {
    
    function thongtinuser($u, $p){
        $u = $this->db->escape_string($u);
        $p = $this->db->escape_string($p);
        $p = md5($p);
        $sql="SELECT * FROM users WHERE username ='$u' AND password ='$p'";
        $kq = $this->db->query($sql);
        if ($kq->num_rows==0) return FALSE;
        else return $kq->fetch_assoc();
    }

    function checkLogin() {
        if (isset($_SESSION['login_id'])== false){
            $_SESSION['error'] = 'Bạn chưa đăng nhập';
            $_SESSION['back'] = $_SERVER['REQUEST_URI'];
            header('location:login.php'); 
            exit();
        }elseif ($_SESSION['login_level']!=1){
            $_SESSION['error'] = 'Bạn không có quyền xem trang này';
            $_SESSION['back'] = $_SERVER['REQUEST_URI'];
            header('location:login.php');
            exit();
        }
    }

    function ListLoaiSP(){
        $sql="SELECT idLoai,TenLoai,ThuTu,AnHien FROM loaisp ORDER BY ThuTu";
        $kq = $this->db->query($sql) ;
        if(!$kq) die( $this-> db->error);
        return $kq; 
    }

    function LoaiSP_Them($TenLoai, $Hinh, $ThuTu,$AnHien){
        $TenLoai= $this->db->escape_string(trim(strip_tags($TenLoai)));
        $Hinh= $this->db->escape_string(trim(strip_tags($Hinh)));
        $ThuTu= $this->db->escape_string(trim(strip_tags($ThuTu)));
        settype($ThuTu,"int");
        settype($AnHien,"int");
        $sql="INSERT INTO loaisp SET TenLoai='$TenLoai', Hinh= '$Hinh', ThuTu=$ThuTu, AnHien=$AnHien, idCL=1";
        $kq= $this->db->query($sql) ;
        if(!$kq) die( $this-> db->error);
    }

    function changeTitle($str){
        $str = $this->stripUnicode($str);
        $str = $this->stripSpecial($str);
        $str = mb_convert_case($str , MB_CASE_LOWER , 'utf-8');
        return $str;
    }

    function stripSpecial($str){
        $arr = array(",","$","!","?","&","'",'"',"+");
            $str = str_replace($arr,"",$str);
            $str = trim($str);
        while (strpos($str,"  ")>0) $str = str_replace("  "," ",$str);
            $str = str_replace(" ","-",$str);
            return $str;
    }

    function stripUnicode($str){
        if(!$str) return false;
        $unicode = array(
        'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
        'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'd'=>'đ','D'=>'Đ',
        'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ', 'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'i'=>'í|ì|ỉ|ĩ|ị', 'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
        'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự', 'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'y'=>'ý|ỳ|ỷ|ỹ|ỵ', 'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
        );
        foreach($unicode as $khongdau=>$codau) {
        $arr = explode("|",$codau);
        $str = str_replace($arr,$khongdau,$str);
        }
        return $str;
    }

    function LoaiSP_ChiTiet($idLoai){
        $sql="SELECT idLoai,TenLoai,ThuTu,AnHien,Hinh  
        FROM loaisp  
        WHERE idLoai=$idLoai";
        $kq = $this->db->query($sql) ;
        if(!$kq) die( $this-> db->error);
        return $kq; 
    }

    function LoaiSP_Sua($idLoai,$TenLoai, $Hinh, $ThuTu,$AnHien){
        settype($idLoai,"int");
        $TenLoai= $this->db->escape_string(trim(strip_tags($TenLoai)));
        $Hinh= $this->db->escape_string(trim(strip_tags($Hinh)));
        $ThuTu= $this->db->escape_string(trim(strip_tags($ThuTu)));
        settype($ThuTu,"int");
        settype($AnHien,"int");
        echo $sql="UPDATE loaisp SET TenLoai='$TenLoai', Hinh='$Hinh', ThuTu=$ThuTu, AnHien=$AnHien, idCL=1 
        WHERE idLoai=$idLoai";
        $kq= $this->db->query($sql) ;
        if(!$kq) die( $this-> db->error);
    }

    function TheLoai_Xoa($idLoai){
        settype($idLoai,"int");
        $sql="DELETE FROM loaisp WHERE idLoai=$idLoai";
        $kq= $this->db->query($sql) ;
        if(!$kq) die( $this-> db->error);		
    }

    function ListSP(){
        $sql="SELECT idDT,loaisp.TenLoai,dienthoai.idLoai,TenDT,MoTa,Gia,dienthoai.AnHien,Hot,loaisp.TenLoai FROM dienthoai,loaisp WHERE loaisp.idLoai=dienthoai.idLoai         
            ORDER BY idDT Desc";
        $kq = $this->db->query($sql) ;
        if(!$kq) die( $this-> db->error);
        return $kq; 
    }

    function SP_Them($TenDT, $MoTa, $Gia, $GiaKM, $baiviet, $urlHinh, $AnHien, $Hot,  $NgayCapNhat, $idLoai){
	  $TenDT = $this->db->escape_string(trim(strip_tags($TenDT)));
	  $MoTa= $this->db->escape_string(trim(strip_tags($MoTa)));
	  $baiviet = $this->db->escape_string($baiviet);
	  $arr = explode ("/", $NgayCapNhat);
	  if (count($arr)==3) $NgayCapNhat = $arr[2]."-".$arr[1]."-".$arr[0];
	  else $NgayCapNhat = date("Y-m-d");
	  $idUser = $_SESSION['login_id'];
      settype($AnHien,"int");
      settype($Hot,"int");
	  settype($Gia,"int");
	  settype($GiaKM,"int");
	  settype($idLoai,"int");
	  $sql="INSERT INTO dienthoai SET TenDT='$TenDT',MoTa='$MoTa', Gia=$Gia, GiaKM=$GiaKM, 
	  idLoai=$idLoai, baiviet='$baiviet', NgayCapNhat='$NgayCapNhat', AnHien=$AnHien, 
	  Hot=$Hot, urlHinh = '$urlHinh', idCL=1, SoLanXem=0, SoLuongTonKho=200, SoLanMua=0";
	  $kq= $this->db->query($sql) ;
	  if(!$kq) die( $this-> db->error);
    }
    
    function SP_ChiTiet($idDT){
        $sql="SELECT * FROM dienthoai WHERE idDT=$idDT";
        $kq = $this->db->query($sql) ;
        if(!$kq) die( $this-> db->error);
        return $kq; 
    }

    function SP_Sua($TenDT, $MoTa, $Gia, $GiaKM, $baiviet, $urlHinh, $AnHien, $Hot,  $NgayCapNhat, $idLoai, $idDT){
	  $TenDT = $this->db->escape_string(trim(strip_tags($TenDT)));
	  $MoTa= $this->db->escape_string(trim(strip_tags($MoTa)));
	  $baiviet = $this->db->escape_string($baiviet);
	  $arr = explode ("/", $NgayCapNhat);
	  if (count($arr)==3) $NgayCapNhat = $arr[2]."-".$arr[1]."-".$arr[0];
	  else $NgayCapNhat = date("Y-m-d");
	  $idUser = $_SESSION['login_id'];
      settype($AnHien,"int");
      settype($Hot,"int");
	  settype($Gia,"int");
	  settype($GiaKM,"int");
      settype($idLoai,"int");
      settype($idDT,"int");
	  $sql="UPDATE dienthoai SET TenDT='$TenDT',MoTa='$MoTa', Gia=$Gia, GiaKM=$GiaKM, 
	  idLoai=$idLoai, baiviet='$baiviet', NgayCapNhat='$NgayCapNhat', AnHien=$AnHien, 
      Hot=$Hot, urlHinh = '$urlHinh', idCL=1, SoLanXem=0, SoLuongTonKho=200, SoLanMua=0
      WHERE idDT=$idDT";
	  $kq= $this->db->query($sql) ;
	  if(!$kq) die( $this-> db->error);
    }

    function SP_Xoa($idDT){
        settype($idDT,"int");
        $sql="DELETE FROM dienthoai WHERE idDT=$idDT";
        $kq= $this->db->query($sql) ;
        if(!$kq) die( $this-> db->error);		
    }
}
