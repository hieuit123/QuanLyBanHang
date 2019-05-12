<?php
	include("create_connect_mysql.php");
	$conn = create_connect();
	$ma = $_GET["maloai"];
	$sql = "DELETE FROM loaisanpham WHERE MA_LOAI='".$ma."'";
	mysqli_query($conn,$sql);
	header('location: quanlyloai.php');
	$conn->close();

?>