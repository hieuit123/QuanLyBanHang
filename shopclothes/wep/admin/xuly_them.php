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
$tensanpham = (isset($_POST["tensanpham"])) ? $_POST["tensanpham"] : null;
$thuonghieu = (isset($_POST["thuonghieu"])) ? $_POST["thuonghieu"] : null;
$loai = (isset($_POST["phanloai"])) ? $_POST["phanloai"] : null;
$gia = (isset($_POST["gia"])) ? $_POST["gia"] : null;
$so_luong = (isset($_POST["so_luong"])) ? $_POST["so_luong"] : null;
$gia_cu = $gia  + 200000;
include('create_connect_mysql.php');
// tạo kết nối database
$conn = create_connect();
$sql = "INSERT INTO SANPHAM(TEN_SANPHAM,THUONGHIEU,GIA,GIA_CU,MA_LOAI,ANH,ANH_CHI_TIET,SO_LUONG) VALUES('".$tensanpham."','".$thuonghieu."','".$gia."','".$gia_cu."','".$loai."','null','null','".$so_luong."')";
//Câu truy vấn sql
if(mysqli_query($conn, $sql)){
	$ma = mysqli_insert_id($conn);// ID tăng tự động. Lấy ra id đã thêm vào database

}

if(($_FILES["anh"]["type"] == "image/jpeg") || ($_FILES["anh"]["type"] == "image/gif") && ($_FILES["anh"]["size"] < 20000) ){

	if($_FILES["anh"]["error"] > 0 && $_FILES["anh_chitiet"]["error"] > 0){
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
		
		$sql_update = "UPDATE SANPHAM SET ANH='image/".$loai."/anh".$ma.".jpg' WHERE MA=".$ma."";
		$sql_update_chitiet = "UPDATE SANPHAM SET ANH_CHI_TIET='image/".$loai."/anhchitiet".$ma.".jpg' WHERE MA=".$ma."";
		
		mysqli_query($conn, $sql_update);
		mysqli_query($conn, $sql_update_chitiet);
		echo '<script>thongbao("thanhcong");</script>';

	}
}
$conn->close();
else '<script>thongbao("thatbai");</script>'
?>