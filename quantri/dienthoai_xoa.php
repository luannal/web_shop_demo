<?php
session_start();
require_once "../class/quantrishop.php";
$qt = new quantrishop;
$qt-> checkLogin();

$idDT = $_GET['idDT']; settype($idDT,"int");
$kq = $qt->SP_Xoa($idDT);
header("location:index.php?p=dienthoai_ds");
