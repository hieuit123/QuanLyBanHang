<script>
	function thongbao(){
		alert("mở khóa thành công!");
		window.location = "quanlytaikhoan.php";
	}

</script>
<?php 

session_start();

$makhachhang = (isset($_GET["makhachhang"])) ? $_GET["makhachhang"] : null;

include('create_connect_mysql.php');

$conn = create_connect();

$sql = "UPDATE KHACHHANG SET KHOA = 0 WHERE ID = '".$makhachhang."'";

if(mysqli_query($conn, $sql)){
	echo '<script>thongbao();</script>';
}



?>