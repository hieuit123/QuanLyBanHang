<?php
    session_start(); 
    include('create_connect_mysql.php');
    $conn = create_connect();
    $tentaikhoan = (isset($_POST['taikhoan'])) ? $_POST['taikhoan'] : '';
    $matkhau = (isset($_POST['matkhau'])) ? $_POST['matkhau'] : '';
    $sql = "SELECT * FROM khachhang WHERE TEN_DANG_NHAP = '".$tentaikhoan."'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if($matkhau === $row['MAT_KHAU']) {
        $_SESSION["login"]='true';
        $_SESSION['tendangnhap'] = $row['HO_TEN'];
        
        header('location: index.php');

    }
    else {
        header('location: index.php?form_dangnhap=true');
    }
?>
