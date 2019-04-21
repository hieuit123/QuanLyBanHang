<script>
	function thongbao(){
		alert("Xóa thành công!");
		window.location = "index.php";
	}

</script>
<?php 

session_start();

$masanpham = (isset($_GET["masanpham"])) ? $_GET["masanpham"] : null;

include('create_connect_mysql.php');

$conn = create_connect();

$sql = "DELETE FROM SANPHAM WHERE MA = '".$masanpham."'";

if(mysqli_query($conn, $sql)){
	echo '<script>thongbao();</script>';

}



?>