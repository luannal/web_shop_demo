<?php
session_start();
require_once "../class/quantrishop.php";
$qt = new quantrishop;
$qt-> checkLogin();

$idLoai = $_GET['idLoai']; settype($idLoai,"int");
$kq = $qt->TheLoai_Xoa($idLoai);
header("location:index.php?p=loai_sp");
