<?php 
require_once "class/goc.php";
class dt extends goc{
	
	function Blog($sotin){
	   $sql="SELECT idTin, TieuDe, TomTat,urlHinh FROM tin  WHERE AnHien = 1 
	   ORDER BY RAND() LIMIT 0,$sotin";	
	   $kq = $this->db->query($sql);	
	   if(!$kq) die( $this-> db->error);
	   return $kq;		
	}
	
	function SanPhamMoi($sosp = 10){				
	   $sql="SELECT idDT, TenDT, urlHinh,Gia FROM dienthoai  WHERE AnHien = 1 
	   ORDER BY NgayCapNhat DESC LIMIT 0,$sosp";	
	   $kq = $this->db->query($sql);	
	   if(!$kq) die( $this-> db->error);
	   return $kq;		
	}
	
	function ListLoaiSP(){
	   $sql="SELECT idLoai, TenLoai, hinh FROM loaisp  WHERE AnHien = 1
	   ORDER BY ThuTu DESC LIMIT 0,12";	
	   $kq = $this->db->query($sql);	
	   if(!$kq) die( $this-> db->error);
	   return $kq;		
	}

	function SanPhamBanChay($sosp = 10){				
	   $sql="SELECT idDT, TenDT, urlHinh FROM dienthoai WHERE AnHien=1 
	   ORDER BY SoLanMua DESC LIMIT 0,$sosp";	
	   $kq = $this->db->query($sql);
	   if(!$kq) die( $this-> db->error);
	   return $kq;
	}
	
	function SanPhamHot($sosp = 10){
	   $sql="SELECT idDT,TenDT,urlHinh FROM dienthoai 
	   WHERE AnHien=1 AND Hot=1 ORDER BY NgayCapNhat DESC LIMIT 0,$sosp";
	   $kq = $this->db->query($sql);
	   if(!$kq) die( $this-> db->error);
	   return $kq;
	}

	function CapNhatGioHang($action, $idDT){	
	   if ( !isset($_SESSION['daySoLuong']) ) $_SESSION['daySoLuong']=array();
	   if ( !isset($_SESSION['dayDonGia']) )  $_SESSION['dayDonGia']=array();
	   if ( !isset($_SESSION['dayTenDT']) )   $_SESSION['dayTenDT']=array();
	   if ( !isset($_SESSION['dayHinh']) )   $_SESSION['dayHinh']=array();
	
	   if ($action=="add") {
		  settype($idDT,"int"); if ($idDT<=0) return;
		  $sql="SELECT TenDT,Gia,SoLuongTonKho, urlHinh FROM dienthoai WHERE idDT=$idDT";
		  $kq = $this->db->query($sql);	
		  if(!$kq) die( $this-> db->error);	
		  $row = $kq->fetch_assoc();		
	
		  $_SESSION['dayTenDT'][$idDT] = $row['TenDT'];
		  $_SESSION['dayDonGia'][$idDT] = $row['Gia'];
		  $_SESSION['daySoLuong'][$idDT]+=1;
		  $_SESSION['dayHinh'][$idDT] = $row['urlHinh'];
	 
		  if ($_SESSION['daySoLuong'][$idDT]>$row['SoLuongTonKho']) $_SESSION['daySoLuong'][$idDT] = $row['SoLuongTonKho'];
		}//add
		
		if ($action=="delete") {
		  settype($idDT,"int"); if ($idDT<=0) return;
		  $sql="SELECT TenDT,Gia,SoLuongTonKho, urlHinh FROM dienthoai WHERE idDT=$idDT";
		  $kq = $this->db->query($sql);	
		  if(!$kq) die( $this-> db->error);	
		  $row = $kq->fetch_assoc();		
	
		  $_SESSION['dayTenDT'][$idDT] = $row['TenDT'];
		  $_SESSION['dayDonGia'][$idDT] = $row['Gia'];
		  $_SESSION['daySoLuong'][$idDT]-=1;
		  $_SESSION['dayHinh'][$idDT] = $row['urlHinh'];
	 	  
		  if ($_SESSION['daySoLuong'][$idDT]<0) $_SESSION['daySoLuong'][$idDT] = 0;
		}
	
	   if ($action=="remove") {
		  settype($idDT,"int"); if ($idDT<=0) return;
		  unset($_SESSION['dayTenDT'][$idDT]);
		  unset($_SESSION['dayDonGia'][$idDT]);
		  unset($_SESSION['daySoLuong'][$idDT]);
		  unset($_SESSION['dayHinh'][$idDT]);
	   } //remove
	   
	   if ($action=="update"){
		   $iddt_arr = $_POST['iddt_arr']; 
		   $soluong_arr = $_POST['soluong_arr']; 
		   for($i=0; $i<count($iddt_arr);$i++){
			  	 $idDT = $iddt_arr[$i]; settype($idDT,"int"); if ($idDT<=0) continue;
				 $soluong=$soluong_arr[$i];settype($soluong,"int");
				 if ($soluong<=0) continue;
				 $kq = $this->chiTietSP($idDT);
				 $row = $kq->fetch_assoc();
				 $_SESSION['dayTenDT'][$idDT] = $row['TenDT'];
				 $_SESSION['dayDonGia'][$idDT] = $row['Gia'];
				 $_SESSION['daySoLuong'][$idDT] = $soluong;
				 $_SESSION['dayHinh'][$idDT] = $row['urlHinh'];
				 if ($_SESSION['daySoLuong'][$idDT]>$row['SoLuongTonKho']) $_SESSION['daySoLuong'][$idDT] = $row['SoLuongTonKho'];	
	   	   } //for
		} //update

	}

	function chiTietSP($idDT){
	  	$sql="SELECT * FROM dienthoai WHERE AnHien = 1 AND idDT=$idDT";
	   	$kq = $this->db->query($sql);
		if(!$kq) die( $this-> db->error);
	   	return $kq;
	}
	
	function LuuDonHang(&$error){    
	  $hoten=$this->db->escape_string( trim(strip_tags( $_SESSION['DonHang']['hoten'] ) ) );
	  $dienthoai = $this->db->escape_string(  trim( strip_tags($_SESSION['DonHang']['dienthoai'] ) ) );
	  $diachi = $this->db->escape_string(  trim( strip_tags($_SESSION['DonHang']['diachi'] ) ) );     
	  $email = $this->db->escape_string(  trim( strip_tags($_SESSION['DonHang']['email'] ) ) );
	  $pttt = $this->db->escape_string(  trim( strip_tags( $_SESSION['DonHang']['payment'] ) ) );      
	  $ptgh = $this->db->escape_string(  trim( strip_tags( $_SESSION['DonHang']['delivery'] ) ) );	

	  //kiểm tra dữ liệu  
	  if (count($_SESSION['daySoLuong'])==0) $error[] = "Bạn chưa chọn sản phẩm nào";
	  if ($hoten == "") $error[] = "Bạn chưa nhập họ tên";
	  if ($diachi == "") $error[] = "Bạn chưa nhập địa chỉ";
	  if ($email == "") $error[] = "Bạn chưa nhập email";
	  if ($dienthoai== "") $error[] = "Bạn ơi! Điện thoại người nhận chưa có";
	  if ($pttt=="") $error[] = "Bạn chưa chọn phương thức thanh toán";
	  if ($ptgh=="") $error[] = "Bạn chưa chọn phương thức giao hàng";
	  if (count($error)>0) return;

	  //lưu dữ liệu vào db    
	  if (isset($_SESSION['DonHang']['idDH'])==false) {
		$sql="INSERT INTO donhang SET tennguoinhan = '$hoten',diachi =
		'$diachi', dtnguoinhan = '$dienthoai',	idpttt = '$pttt',idptgh=
		'$ptgh', thoidiemdathang = now() ";
		$kq = $this->db->query($sql);
		if(!$kq) die( $this-> db->error);
		$_SESSION['DonHang']['idDH'] = $this->db->insert_id;

	  }
	  else{
		$idDH = $_SESSION['DonHang']['idDH'];
		$sql="UPDATE donhang SET tennguoinhan = '$hoten',diachi= 
		'$diachi', dtnguoinhan = '$dienthoai', idpttt='$pttt',idptgh=
		'$ptgh', thoidiemdathang = now() 
		WHERE idDH = $idDH";
		$kq = $this->db->query($sql) ;
		if(!$kq) die( $this-> db->error);
	  }
  
	}

	function LuuChiTietDonHang(){		
	   $sosp = count($_SESSION['daySoLuong']);
	   if ($sosp<=0) {echo "Không có sản phẩm"; return;}
	   if (isset($_SESSION['DonHang']['idDH'])==false){echo "Không có idDH"; return;}
	   $idDH = $_SESSION['DonHang']['idDH'];
	   $sql = "DELETE FROM donhangchitiet WHERE idDH = $idDH";
	   $this->db->query($sql);
	   reset( $_SESSION['daySoLuong'] ); 
	   reset( $_SESSION['dayDonGia'] );
	   reset( $_SESSION['dayTenDT'] );
	   reset( $_SESSION['dayHinh']);		
	   for ($i = 0; $i<$sosp ; $i++) {
		   $idDT = key( $_SESSION['daySoLuong'] );
		   $tendt = current( $_SESSION['dayTenDT'] );
		   $soluong = current( $_SESSION['daySoLuong'] );
		   $gia = current( $_SESSION['dayDonGia'] );
		   $sql ="INSERT INTO donhangchitiet (idDH,idDT,TenDT,SoLuong,Gia)
				  VALUES ($idDH, $idDT, '$tendt',$soluong, $gia)";		
		   $this->db->query($sql);
		   next( $_SESSION['daySoLuong'] );  
		   next( $_SESSION['dayDonGia'] );
		   next( $_SESSION['dayTenDT'] );
		   next( $_SESSION['dayHinh'] );
	   }//for
	}

	function SanPhamTrongLoai($TenLoai,$pageNum, $pageSize,&$totalRows ){
	   $TenLoai = $this->db->escape_string($TenLoai);
	   $startRow = ($pageNum-1)*$pageSize;
	   $sql="SELECT idDT, TenDT, urlHinh, Gia FROM dienthoai  WHERE AnHien = 1
	   AND idLoai in (select idLoai FROM loaisp WHERE TenLoai='$TenLoai') 
	   ORDER BY NgayCapNhat DESC LIMIT $startRow , $pageSize ";	
	   $kq = $this->db-> query($sql);
	   if(!$kq) die( $this-> db->error);	
		
	   $sql="SELECT count(*) FROM dienthoai WHERE AnHien = 1 
	   AND idLoai in (select idLoai FROM loaisp WHERE TenLoai='$TenLoai')";   
	   $rs = $this->db->query($sql) ;	
	   $row_rs = $rs->fetch_row();
	   $totalRows = $row_rs[0];
	   if(!$kq) die( $this-> db->error);	
	   return $kq;		
	}
	
	function pagesList1($baseURL,$totalRows,$pageNum,$pageSize,$offset){
	   if ($totalRows<=0) return "";
	   $totalPages = ceil($totalRows/$pageSize);
	   if ($totalPages<=1) return "";
	   $from = $pageNum - $offset;	
	   $to = $pageNum + $offset;
	   if ($from <=0) { $from = 1;   $to = $offset*2; }
	   if ($to > $totalPages) { $to = $totalPages; }
	   $links = "<ul class='pagination'>";
	   for($j = $from; $j <= $to; $j++) {
	   if ($j==$pageNum) 
	   $links=$links."<li class='active'><a href='$baseURL/$j/' >$j</a></li>";
	   else
		  $links= $links."<li><a href = '$baseURL/$j/'>$j</a></li>"; 
	   } //for
	   $links= $links."</ul>";
	   return $links;
	} 

	function layHinhSP($idDT, $sohinh){
	   $sql="SELECT urlHinh FROM hinh  WHERE AnHien = 1 AND
			 idDT=$idDT LIMIT 0, $sohinh";
	   $kq = $this->db->query($sql);
	   if(!$kq) die( $this-> db->error);
	   return $kq;
	}
	
	function LayidDT($tenDT){
		$sql="SELECT idDT FROM dienthoai WHERE TenDT = '$tenDT'";
		$kq = $this->db->query($sql);
		if(!$kq) die( $this->db->error);
		$row = $kq->fetch_row();
		$idDT= $row[0];
	   	return $idDT;
	}

	
	function LayTenLoai($idLoai){
		$sql="SELECT TenLoai FROM loaisp WHERE idLoai = '$idLoai'";
		$kq = $this->db->query($sql);
		if(!$kq) die( $this->db->error);
		$row = $kq->fetch_row();
		$TenLoai= $row[0];
	   	return $TenLoai;
	}

	function GuiMail($to, $from, $from_name, $subject, $body, $username, $password, &$error){ 
	   $error="";
	   require_once "class.phpmailer.php";      
	   require_once "class.smtp.php";      
	   try {
		  $mail = new PHPMailer();  
		  $mail->IsSMTP(); 
		  $mail->SMTPDebug = 0;  //  1=errors and messages, 2=messages only
		  $mail->SMTPAuth = true;  
		  $mail->SMTPSecure = 'ssl'; 
		  $mail->Host = 'smtp.gmail.com';
		  $mail->Port = 465; 
		  $mail->Username = $username;  
		  $mail->Password = $password;           
		  $mail->SetFrom($from, $from_name);
		  $mail->Subject = $subject;
		  $mail->MsgHTML($body);// noi dung chinh cua mail
		  $mail->AddAddress($to);
		  $mail->CharSet="utf-8";
		  $mail->IsHTML(true);   
		  $mail->SMTPOptions = array(
				'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
			));
		  if(!$mail->Send()) {$error='Loi:'.$mail->ErrorInfo; return false;}
		  else { $error = ''; return true; }
	   } 
	   catch (phpmailerException $e) { echo "<pre>".$e->errorMessage(); }    
	}

	function DangKyThanhVien(&$loi){			
		 $thanhcong = true;
		  //tiếp nhận dữ liệu từ form
		 $email = $this->db->escape_string(trim(strip_tags($_POST['mail'])));
		 $pass=$this->db->escape_string(trim(strip_tags($_POST['pass'])));
		 $repass=$this->db->escape_string(trim(strip_tags($_POST['repass']))); 
		 $ht = $this->db->escape_string(trim(strip_tags($_POST['ht'])));	
		 $dc=$this->db->escape_string(trim(strip_tags($_POST['dc'])));
		 $dt=$this->db->escape_string(trim(strip_tags($_POST['dt'])));
		 $p = $_POST['phai']; settype($phai, "int");
		  //kiễm tra dữ liệu
		if ($email == NULL){
			 $thanhcong = false;
			 $loi['email'] = "Bân chưa nhập email"; }
		elseif (filter_var($email,FILTER_VALIDATE_EMAIL)==FALSE) { 
			 $thanhcong = false; 
			 $loi['email']="Bạn nhập email không đúng";
		}elseif ($this->CheckEmail($email)==false) { 
			 $thanhcong = false; 
			 $loi['email'] = "Email này đã có người dùng";
		}
		//kiêm tra mật khẩu và gõ lại mật khẩu
		if ($pass == NULL) {
			$thanhcong = false; 
			$loi['pass'] = "Bạn chưa nhập mật khẩu";
		}elseif (strlen($pass)<6 ) {
			$thanhcong = false; 
			$loi['pass'] = "Mật khẩu của bạn phải >=6 ký tự";
		} 
		if ($repass == NULL) {
			$thanhcong=false; 
			$loi['repass'] = "Nhập lại mật khẩu đi";
		}elseif ($pass != $repass ) { 
			$thanhcong = false; 
			$loi['repass'] = "Mật khẩu 2 lần không giống";
		}
		//kiêm tra họ tên
		if ($ht == NULL){
			$thanhcong = false; 
			$loi['hoten']= "Chưa nhập họ tên";
		}
		//kiêm tra địa chỉ
		if ($dc == NULL){
			$thanhcong = false; 
			$loi['diachi']= "Chưa nhập địa chỉ";
		}
		//kiêm tra điện thoại
		if ($dt == NULL){
			$thanhcong = false; 
			$loi['dienthoai']= "Chưa nhập điện thoại";
		}
		 // chèn dữ liệu
		 if ($thanhcong==true) {
			 $mahoa = md5($pass);
			 $rd = md5(rand(1,99999));
			 $sql = "INSERT INTO  users  
			 SET email='$email', password= '$mahoa', hoten='$ht', diachi='$dc', 
				 dienthoai='$dt',gioitinh=$p, active=0, randomkey='$rd', ngaydangky=NOW()";
			 $kq = $this->db->query($sql) ;
			 $id = $this->db->insert_id;
			$subject = "Kích hoạt tài khoản";
			$content = file_get_contents("dangky_thukichhoat.html");		
			$link="http://".$_SERVER['SERVER_NAME']."/banhang/kh.php?id=$id&rd=$rd";
			$noidungthu = str_replace(	
			   array("{email}","{matkhau}","{hoten}","{link}"), 
			   array($email,$pass,$ht,$link),$content);
			$from = "anh.luan.saigon@gmail.com"; //dùng mail test, đừng dùng mail chính thức
			$p = "anhluan123"; 
			$this->GuiMail($email,$from,$ten="BQT",$subject,$noidungthu,$from,$p,$error);
			if ($error!="") $loi['guimail']=$error;
		}
		 return $thanhcong;
	}//DangKyThanhVien

	function CheckEmail($email){
		$sql="select idUser from users where email ='{$email}'";
		$kq = $this->db->query($sql);
		if ($kq->num_rows>0) return false;	
	   else return true;
	}
	
	function  DanhDauKichHoatUser($id, $rd){
		$sql="UPDATE users SET active=1 WHERE iduser =$id AND randomkey='$rd' AND active=0";
		$kq = $this->db->query($sql);
		return $this->db->affected_rows;
	}

	function login($email, $p, &$loi){
	    $loi=array();
	    $email = $this->db->escape_string(trim(strip_tags($email)));
	    $p = $this->db->escape_string(trim(strip_tags($p)));
	    $p_mahoa = md5($p);

	    $sql="SELECT * FROM users WHERE email='$email'";
	    $kq = $this->db->query($sql);
	    if ($kq->num_rows==0) { 
	      $loi['mail']="<span class='label label-warning'>Email không có</span>";
	      return FALSE;
	    }

	    $sql="SELECT * FROM users WHERE email='$email' AND password ='$p_mahoa'";
	    $kq = $this->db->query($sql);
	    if ($kq->num_rows==0) { 
	       $loi['pass']="<span class='label label-info'>Mật khẩu kô đúng</span>";
	       return FALSE;
	     } 
	    $row = $kq->fetch_assoc();
	    $_SESSION['login_id']   = $row['idUser'];
	    $_SESSION['login_hoten'] = $row['HoTen'];
	    $_SESSION['login_email'] = $row['Email'];
	    return TRUE;
	}

	function GuiPass(&$loi){			
		 $thanhcong = true;
		  //tiếp nhận dữ liệu từ form
		 $email = $this->db->escape_string(trim(strip_tags($_POST['email'])));
		  //kiễm tra dữ liệu
		if ($email == NULL){
			 $thanhcong = false;
			 $loi['email'] = "Bân chưa nhập email"; }
		elseif (filter_var($email,FILTER_VALIDATE_EMAIL)==FALSE) { 
			 $thanhcong = false; 
			 $loi['email']="Bạn nhập email không đúng";
		}elseif ($this->CheckEmail($email)==true) { 
			 $thanhcong = false; 
			 $loi['email'] = "Email nay khong ton tai";
		}

		 if ($thanhcong==true) {
			$passnew = substr(md5(rand(0,9999)),0,6);
			$pass_mh = md5($passnew);
			$sql= "UPDATE users SET Password='$pass_mh' WHERE Email='$email'";
			$kq = $this->db->query($sql) ;
			$subject = "Gửi lại Mật Khẩu";
			$content = "Bạn hoặc ai đó đã yêu cầu gửi lại mật khẩu mới. Mật Khẩu mới của bạn là: {$passnew}";		
			$from = "anh.luan.saigon@gmail.com"; //dùng mail test, đừng dùng mail chính thức
			$p = "anhluan123"; 
			$this->GuiMail($email,$from,$ten="BQT",$subject,$content,$from,$p,$error);
			if ($error!="") $loi['guimail']=$error;
		}
		 return $thanhcong;
	}

	function checkLogin() {
		if (isset($_SESSION['login_id'])== false){
		    $_SESSION['error'] = 'Bạn chưa đăng nhập';
		    $_SESSION['back'] = $_SERVER['REQUEST_URI'];
		    header('location:login.php'); 
		    exit();
		}
	}// checkLogin

	function DoiMatKhau($passold, $pass, $repass, &$loi){
		$thanhcong = true;
		$passold = $this->db->escape_string(trim(strip_tags($passold)));
		$pass = $this->db->escape_string(trim(strip_tags($pass)));
		$repass = $this->db->escape_string(trim(strip_tags($repass))); 
		$iduser = $_SESSION['login_id'];	
		// kiểm tra dữ liệu nhập
		$pass_min = 3;	
		if ($passold==NULL){$thanhcong=false; $loi[]="Chưa nhập mật khẩu cũ"; }
		else {
		  $sql="select * from users where idUser=$iduser and password= md5('$passold')";
		  $rs = $this->db->query($sql);
		  if ($rs->num_rows==0) {$thanhcong=false; $loi[]="Pass cũ kô đúng";}	
		}
		if ($pass==NULL){$thanhcong=false;$loi[]="Chưa nhập pass mới";}
		elseif (strlen($pass)<$pass_min) { 
		   $thanhcong = false; 
		   $loi[] = "Mật khẩu mới quá ngắn.>= $pass_min ký tự";
		}
		elseif ($pass!=$repass) {
		   $thanhcong = false; 
		   $loi[] = "Mật khẩu mới nhập 2 lần không giống nhau";
		}		
		if ($thanhcong ==true) { // cập nhật pass mới
		   $sql="UPDATE users SET password=md5('$pass') where iduser=$iduser";
		   $this->db->query($sql);
		}	
		return $thanhcong;
	} //function DoiPass

	function LayTin($idTin){
		settype($idTin, "int");
	  	$sql="SELECT * FROM tin WHERE AnHien = 1 AND idTin = $idTin";
	   	$kq = $this->db->query($sql);
		if(!$kq) die( $this-> db->error);
		return $kq->fetch_assoc();
	}
}
?>
