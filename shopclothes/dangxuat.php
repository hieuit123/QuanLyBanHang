<?php 
session_start();
include('create_connect_mysql.php');
$conn = create_connect();
$sql = "UPDATE khachhang SET TRANG_THAI = 'offline' WHERE ID = '".$_SESSION['ma_khach_hang']."'";
mysqli_query($conn,$sql);
$conn->close();
session_destroy();
header('location: index.php?form_dangnhap=true');
?>
