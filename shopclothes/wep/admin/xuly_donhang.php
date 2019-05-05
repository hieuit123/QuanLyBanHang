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
// lấy dữ liệu từ bảng chi tiết đơn với where là mã đơn, sau đó lấy từng dòng ra, lấy mã sản phẩm cho vào truy vấn banrng sản phẩm update lấy dữ liệu sản phẩm từ bảng sản phẩm lấy số lượng kho trừ cho số lượng chi tiets hóa  đơn . ok. Vào admin copy quản lý đơn hàng. xài truy vấn sql bỏ dữ liệu vào quản lý đơn hàng 
if(mysqli_query($conn, $sql)){
	$sql_chitiet = "SELECT * FROM chitietdonhang WHERE MA_DON = '".$madonhang."'";
	$result_chitiet = mysqli_query($conn,$sql_chitiet);
	while ($row = $result_chitiet->fetch_assoc()) {
		# code...
		$sql_capnhat = "UPDATE sanpham SET sanpham.SO_LUONG = (sanpham.SO_LUONG - ".$row['SO_LUONG'].") WHERE sanpham.MA = '".$row['MA_SAN_PHAM']."'";
		mysqli_query($conn,$sql_capnhat);
	}
	$conn->close();
	echo '<script>thongbao();</script>';
}



?>