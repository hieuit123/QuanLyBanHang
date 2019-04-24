<script>
	function thongbao(){
		alert("Xóa thành công!");
		window.location = "quanlytaikhoan.php";
	}

</script>
<?php 

session_start();

$makhachhang = (isset($_GET["makhachhang"])) ? $_GET["makhachhang"] : null;

include('create_connect_mysql.php');

$conn = create_connect();

$sql = "DELETE FROM KHACHHANG WHERE ID = '".$makhachhang."'";

if(mysqli_query($conn, $sql)){
	echo '<script>thongbao();</script>';
}



?>