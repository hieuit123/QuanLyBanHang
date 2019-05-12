<?php 
	session_start();
	/////
	include('create_connect_mysql.php');
	$conn = create_connect();
	$sql = "SELECT * FROM khachhang WHERE ID = ".$_SESSION['ma_khach_hang'];
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if($row['KHOA'] == "1") {
	echo '<script>alert("Tài khoản của bạn đã bị khóa!");window.location = "dangxuat.php";</script>';
	}
	/////
	$makhachhang = ( isset($_SESSION['ma_khach_hang']) ) ? $_SESSION['ma_khach_hang'] : "";
	if($makhachhang != ""){
		$diachi = (isset($_GET['diachi'])) ? $_GET['diachi'] : "";
		$sql = "UPDATE khachhang SET DIA_CHI = '".$diachi."' WHERE ID = ".$makhachhang."";
		$_SESSION['dia_chi'] = $diachi;
		mysqli_query($conn,$sql);
		header('location: cart.php');
	}


 ?>
