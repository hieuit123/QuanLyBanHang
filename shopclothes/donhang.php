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
    $ho_ten = (isset($_SESSION["tendangnhap"])) ? $_SESSION["tendangnhap"] : "";
    $makhachhang = (isset($_SESSION["ma_khach_hang"])) ? $_SESSION["ma_khach_hang"] : "";
    $sql = "SELECT * FROM donhang WHERE MA_KHACH_HANG = '".$makhachhang."'";
    $result = mysqli_query($conn,$sql);

?>




<!DOCTYPE html>
<html>
<head>

    <title>Đơn hàng</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap-4.1.2/popper.js"></script>
<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/custom.js"></script>
    <link rel="stylesheet" type="text/css" href="styles_donhang.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/solid.css" integrity="sha384-QokYePQSOwpBDuhlHOsX0ymF6R/vLk/UQVz3WHa6wygxI5oGTmDTv8wahFOSspdm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/fontawesome.css" integrity="sha384-vd1e11sR28tEK9YANUtpIOdjGW14pS87bUBuOIoBILVWLFnS+MCX9T6MMf0VdPGq" crossorigin="anonymous">
</head>
<body>
<?php include('header.php'); ?>
    <div class="tieude">Quản lí đơn hàng</div>
    <table>
        <tr>
            <th>STT</th>
            <th>Mã đơn</th>
            <th>Thời gian đặt</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
        </tr>
        <?php
            $i = 0;
            while ($row = $result->fetch_assoc()){
                $sql_chitiet = "SELECT * ,SUM(ct.SO_LUONG) TONG_SO_LUONG, SUM(ct.TONG_TIEN) TIEN_HOA_DON FROM chitietdonhang ct WHERE MA_DON = '" .$row['MA_DON']."'";
                $result_chitiet = mysqli_query($conn,$sql_chitiet);
                $row_chitiet = $result_chitiet->fetch_assoc();
                echo '<tr>
                        <td>'.++$i.'</td>
                        <td>'.$row["MA_DON"].'</td>
                        <td>'.$row["THOI_GIAN"].'</td>
                        <td>'.$row_chitiet["TONG_SO_LUONG"].'</td>
                        <td>'.str_replace(",",".",number_format($row_chitiet['TIEN_HOA_DON'])).'</td>
                        <td>'.$row["TRANG_THAI"].'
                    </tr>';
            }
            $conn->close();
        ?>
    </table>


</body>
</html>