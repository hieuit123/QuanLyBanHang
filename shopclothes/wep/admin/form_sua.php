<script type="text/javascript"> 
	function thongbao(){
		alert("Sửa thành công !");
		window.location = "quanlyloai.php";
	}
</script>
<?php
	$ma = $_GET["maloai"];
	$sql = "SELECT * FROM loaisanpham WHERE MA_LOAI='".$ma."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	if(isset($_POST['tenloai'])){
		$tenloai = $_POST['tenloai'];
		$sql_update = "UPDATE loaisanpham SET TEN_LOAI='".$tenloai."' WHERE MA_LOAI='".$ma."'";
		mysqli_query($conn,$sql_update);
		echo "<script>thongbao();</script>";
	}
?>

<div class="title-2"><b>Sửa tên loại sản phẩm</b></div>
<form method="post" action="#">
		<div>Mã loại : <?php echo $row["MA_LOAI"]; ?></div>
		<div>Nhập vào tên loại :</div>
		<input type="text" name="tenloai" value=<?php echo '"'.$row["TEN_LOAI"].'"'; ?>>
		<input type="submit" name="submit" value="OK">
</form>