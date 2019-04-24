<script>
	function thongbao(){
		alert("Đã xử lý!");
		window.location = "quanlydonhang.php";
	}

</script>
<?php 

session_start();

$madonhang = (isset($_GET["madonhang"])) ? $_GET["madonhang"] : null;

include('create_connect_mysql.php');

$conn = create_connect();

$sql = "UPDATE DONHANG SET TRANG_THAI ='Đã xử lý' WHERE MA_DON = '".$madonhang."'";

if(mysqli_query($conn, $sql)){
	$conn->close();
	echo '<script>thongbao();</script>';
}



?>