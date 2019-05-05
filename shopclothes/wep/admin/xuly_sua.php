<script>
	function thongbao(danhdau){
		if(danhdau == "thanhcong"){
			alert("Thêm thành công!");	
		}
		if(danhdau == "thatbai"){
			alert("Thêm thất bại!");
		}
		window.location = "index.php";
	}

</script>
<?php 

session_start();
$ma = (isset($_SESSION["ma_sua"])) ? $_SESSION["ma_sua"] : null;
$tensanpham = (isset($_POST["tensanpham"])) ? $_POST["tensanpham"] : null;
$thuonghieu = (isset($_POST["thuonghieu"])) ? $_POST["thuonghieu"] : null;
$loai = (isset($_POST["phanloai"])) ? $_POST["phanloai"] : null;
$so_luong = (isset($_POST["so_luong"])) ? $_POST["so_luong"] : null;
$gia = (isset($_POST["gia"])) ? $_POST["gia"] : null;
$gia_cu = $gia  + 200000;
include('create_connect_mysql.php');
$conn = create_connect();
$sql = "UPDATE SANPHAM SET TEN_SANPHAM='".$tensanpham."',THUONGHIEU='".$thuonghieu."',GIA='".$gia."',GIA_CU='".$gia_cu."',MA_LOAI='".$loai."',SO_LUONG=".$so_luong." WHERE MA=".$ma;
if(mysqli_query($conn,$sql)){
	echo '<script>thongbao("thanhcong");</script>';
}

if(($_FILES["anh"]["type"] == "image/jpeg") || ($_FILES["anh"]["type"] == "image/gif") && ($_FILES["anh"]["size"] < 20000) ){

	if($_FILES["anh"]["error"] > 0 || $_FILES["anh_chitiet"]["error"] > 0){
		echo "Lỗi";
	}
	else{
		$tmp_name = $_FILES["anh"]["tmp_name"];
		$tmp_name_chitiet = $_FILES["anh_chitiet"]["tmp_name"];

		$fldimageurl = "../../images/image/".$loai."/anh".$ma.".jpg";
		$fldimageurl_chitiet = "../../images/image/".$loai."/anhchitiet".$ma.".jpg";

		move_uploaded_file($tmp_name,$fldimageurl);
		$fldimageurl_chitiet = "../../images/image/".$loai."/anhchitiet".$ma.".jpg";
		move_uploaded_file($tmp_name_chitiet,$fldimageurl_chitiet);
		
		$sql_anh = "UPDATE SANPHAM SET ANH='image/".$loai."/anh".$ma.".jpg',ANH_CHI_TIET='image/".$loai."/anhchitiet".$ma.".jpg' WHERE MA=".$ma;
		mysqli_query($conn,$sql_anh);
		
	}
}
$conn->close();
?>