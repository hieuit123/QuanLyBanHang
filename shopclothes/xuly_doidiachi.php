<?php 
	session_start();
	$makhachhang = ( isset($_SESSION['ma_khach_hang']) ) ? $_SESSION['ma_khach_hang'] : "";
	if($makhachhang != ""){
		$diachi = (isset($_GET['diachi'])) ? $_GET['diachi'] : "";
		include('create_connect_mysql.php');
		$conn = create_connect();
		$sql = "UPDATE khachhang SET DIA_CHI = '".$diachi."' WHERE ID = ".$makhachhang."";
		$_SESSION['dia_chi'] = $diachi;
		mysqli_query($conn,$sql);
		header('location: cart.php');
	}


 ?>
